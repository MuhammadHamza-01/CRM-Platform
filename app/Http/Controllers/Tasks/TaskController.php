<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $filter = $request->get('filter', 'all');
        $userId = auth()->id();

        $query = Task::forUser($userId)->orderByRaw("CASE WHEN status='pending' THEN 0 ELSE 1 END")->orderBy('deadline');

        if ($filter === 'pending') {
            $query->pending();
        } elseif ($filter === 'completed') {
            $query->completed();
        }

        $tasks      = $query->paginate(15)->withQueryString();
        $totalCount     = Task::forUser($userId)->count();
        $pendingCount   = Task::forUser($userId)->pending()->count();
        $completedCount = Task::forUser($userId)->completed()->count();
        $overdueCount   = Task::forUser($userId)->pending()
                            ->whereNotNull('deadline')
                            ->whereDate('deadline', '<', now())
                            ->count();

        return view('tasks.index', compact(
            'tasks', 'filter', 'totalCount', 'pendingCount', 'completedCount', 'overdueCount'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
        ]);

        auth()->user()->tasks()->create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }

    public function toggle(Task $task): RedirectResponse
    {
        $this->authorizeTask($task);

        $task->update([
            'status' => $task->isCompleted() ? 'pending' : 'completed',
        ]);

        return back()->with('success', $task->isCompleted() ? 'Task marked as completed!' : 'Task marked as pending.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->authorizeTask($task);
        $task->delete();

        return back()->with('success', 'Task deleted.');
    }

    public function edit(Task $task): View
    {
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->authorizeTask($task);

        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
            'status'   => ['required', 'in:pending,completed'],
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    private function authorizeTask(Task $task): void
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
