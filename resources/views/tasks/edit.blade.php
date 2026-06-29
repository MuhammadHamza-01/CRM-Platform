@extends('layouts.dashboard')
@section('title', 'Edit Task')
@section('header', 'Edit Task')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4 flex items-center gap-3" style="border-bottom:1px solid #334155;">
            <a href="{{ route('tasks.index') }}" class="text-sm" style="color:#22D3EE;">← Back</a>
            <h3 class="font-semibold" style="color:#E5E7EB;">Edit Task</h3>
        </div>
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="px-5 py-5 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Task Title</label>
                <input type="text" name="title" required value="{{ old('title', $task->title) }}"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                @error('title')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Deadline <span class="text-xs font-normal" style="color:#94A3B8;">(optional)</span></label>
                <input type="date" name="deadline" value="{{ old('deadline', $task->deadline?->format('Y-m-d')) }}"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none; color-scheme:dark;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg text-sm" style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;" onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                    <option value="pending"   {{ old('status',$task->status)==='pending'   ? 'selected':'' }}>Pending</option>
                    <option value="completed" {{ old('status',$task->status)==='completed' ? 'selected':'' }}>Completed</option>
                </select>
            </div>
            <div class="flex gap-3 pt-1">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors" style="background-color:#22D3EE; color:#0F172A;" onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">Save Changes</button>
                <a href="{{ route('tasks.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors" style="background-color:#334155; color:#E5E7EB;" onmouseover="this.style.backgroundColor='#475569'" onmouseout="this.style.backgroundColor='#334155'">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
