<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(Request $request): View
    {
        $userId  = auth()->id();
        $type    = $request->get('type', 'all');
        $status  = $request->get('status', 'all');

        $query = Activity::forUser($userId)->orderBy('activity_date', 'desc');

        if ($type !== 'all') {
            $query->ofType($type);
        }
        if ($status !== 'all') {
            $query->withStatus($status);
        }

        $activities = $query->paginate(12)->withQueryString();

        // Stats
        $totalCount     = Activity::forUser($userId)->count();
        $meetingCount   = Activity::forUser($userId)->ofType('meeting')->count();
        $callCount      = Activity::forUser($userId)->ofType('call')->count();
        $noteCount      = Activity::forUser($userId)->ofType('note')->count();
        $followUpCount  = Activity::forUser($userId)->ofType('follow_up')->count();

        // Upcoming follow-ups (next 7 days)
        $upcomingFollowUps = Activity::forUser($userId)
            ->upcomingFollowUps()
            ->take(5)
            ->get();

        return view('activities.index', compact(
            'activities', 'type', 'status',
            'totalCount', 'meetingCount', 'callCount', 'noteCount', 'followUpCount',
            'upcomingFollowUps'
        ));
    }

    public function create(): View
    {
        return view('activities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type'          => ['required', 'in:meeting,call,note,follow_up'],
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:2000'],
            'activity_date' => ['required', 'date'],
            'follow_up_date'=> ['nullable', 'date'],
            'status'        => ['required', 'in:planned,completed,cancelled'],
        ]);

        $validated['user_id'] = auth()->id();
        Activity::create($validated);

        return redirect()->route('activities.index')->with('success', 'Activity logged successfully!');
    }

    public function show(Activity $activity): View
    {
        $this->authorizeActivity($activity);
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        $this->authorizeActivity($activity);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $this->authorizeActivity($activity);

        $validated = $request->validate([
            'type'          => ['required', 'in:meeting,call,note,follow_up'],
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:2000'],
            'activity_date' => ['required', 'date'],
            'follow_up_date'=> ['nullable', 'date'],
            'status'        => ['required', 'in:planned,completed,cancelled'],
        ]);

        $activity->update($validated);

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $this->authorizeActivity($activity);
        $activity->delete();

        return back()->with('success', 'Activity deleted.');
    }

    private function authorizeActivity(Activity $activity): void
    {
        if ($activity->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
