@extends('layouts.dashboard')
@section('title', 'My Tasks')
@section('header', 'My Tasks')

@section('content')
<div class="max-w-3xl mx-auto space-y-5">

    @if(session('success'))
    <div class="px-4 py-3 rounded-lg text-sm flex items-center gap-2" style="background-color:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.3); color:#22D3EE;">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        @php $stats = [
            ['label'=>'Total',     'val'=>$totalCount,    'color'=>'#E5E7EB'],
            ['label'=>'Pending',   'val'=>$pendingCount,  'color'=>'#818CF8'],
            ['label'=>'Completed', 'val'=>$completedCount,'color'=>'#22D3EE'],
            ['label'=>'Overdue',   'val'=>$overdueCount,  'color'=>'#F87171'],
        ]; @endphp
        @foreach($stats as $s)
        <div class="rounded-xl p-4 text-center" style="background-color:#1E293B; border:1px solid #334155;">
            <div class="text-2xl font-bold" style="color:{{ $s['color'] }};">{{ $s['val'] }}</div>
            <div class="text-xs mt-1" style="color:#94A3B8;">{{ $s['label'] }}</div>
        </div>
        @endforeach
    </div>

    <!-- Add task form -->
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-3" style="border-bottom:1px solid #334155;">
            <h3 class="text-xs font-semibold uppercase tracking-wider" style="color:#94A3B8;">Add New Task</h3>
        </div>
        <form action="{{ route('tasks.store') }}" method="POST" class="px-5 py-4">
            @csrf
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1">
                    <input type="text" name="title" placeholder="Task title..." required value="{{ old('title') }}"
                        class="w-full px-4 py-2.5 rounded-lg text-sm"
                        style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                        onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                        onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                    @error('title')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
                </div>
                <input type="date" name="deadline" value="{{ old('deadline') }}"
                    class="px-4 py-2.5 rounded-lg text-sm w-full sm:w-auto"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none; color-scheme:dark;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                <button type="submit" class="px-5 py-2.5 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
                    + Add Task
                </button>
            </div>
        </form>
    </div>

    <!-- Filter tabs -->
    <div class="flex flex-wrap gap-2">
        @foreach(['all'=>'All','pending'=>'Pending','completed'=>'Completed'] as $key=>$label)
        <a href="{{ route('tasks.index', ['filter'=>$key]) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium transition-colors"
           style="{{ $filter===$key ? 'background-color:rgba(34,211,238,0.15); color:#22D3EE; border:1px solid rgba(34,211,238,0.3);' : 'background-color:#1E293B; color:#94A3B8; border:1px solid #334155;' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    <!-- Task list -->
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
        @forelse($tasks as $task)
        <div class="flex items-center gap-3 px-4 py-4 transition-colors {{ !$loop->first ? 'border-t' : '' }}"
             style="{{ !$loop->first ? 'border-color:#334155;' : '' }} {{ $task->isCompleted() ? 'opacity:0.65;' : '' }}"
             onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">

            <!-- Toggle -->
            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="flex-shrink-0">
                @csrf @method('PATCH')
                <button type="submit" class="w-5 h-5 rounded flex items-center justify-center border-2 transition-all"
                    style="{{ $task->isCompleted() ? 'background-color:#22D3EE; border-color:#22D3EE;' : 'background-color:transparent; border-color:#334155;' }}"
                    onmouseover="this.style.borderColor='#22D3EE'" onmouseout="this.style.borderColor='{{ $task->isCompleted() ? '#22D3EE' : '#334155' }}'">
                    @if($task->isCompleted())
                    <svg class="w-3 h-3" style="color:#0F172A;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    @endif
                </button>
            </form>

            <!-- Title + deadline -->
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium truncate {{ $task->isCompleted() ? 'line-through' : '' }}" style="color:{{ $task->isCompleted() ? '#94A3B8' : '#E5E7EB' }};">{{ $task->title }}</p>
                @if($task->deadline)
                <p class="text-xs mt-0.5" style="color:{{ $task->isOverdue() ? '#F87171' : '#94A3B8' }};">
                    {{ $task->isOverdue() ? '⚠ Overdue · ' : '📅 ' }}{{ $task->deadline->format('d M Y') }}
                </p>
                @else
                <p class="text-xs mt-0.5" style="color:#475569;">No deadline</p>
                @endif
            </div>

            <!-- Badge (hidden on tiny screens) -->
            <span class="hidden sm:inline-flex px-2.5 py-1 rounded-full text-xs font-semibold flex-shrink-0"
                  style="{{ $task->isCompleted() ? 'background-color:rgba(34,211,238,0.1); color:#22D3EE;' : 'background-color:rgba(129,140,248,0.1); color:#818CF8;' }}">
                {{ $task->isCompleted() ? 'Completed' : 'Pending' }}
            </span>

            <!-- Actions -->
            <div class="flex items-center gap-1 flex-shrink-0">
                <a href="{{ route('tasks.edit', $task) }}" class="p-1.5 rounded-lg transition-colors" style="color:#94A3B8;"
                   onmouseover="this.style.backgroundColor='#334155'; this.style.color='#E5E7EB'"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-1.5 rounded-lg transition-colors" style="color:#94A3B8;"
                        onmouseover="this.style.backgroundColor='rgba(248,113,113,0.15)'; this.style.color='#F87171'"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="px-5 py-14 text-center">
            <svg class="w-12 h-12 mx-auto mb-3" style="color:#334155;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            <p class="text-sm" style="color:#94A3B8;">No tasks found. Add one above!</p>
        </div>
        @endforelse
    </div>

    @if($tasks->hasPages())
    <div>{{ $tasks->links() }}</div>
    @endif
</div>
@endsection
