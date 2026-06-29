@extends('layouts.dashboard')
@section('title', 'Ticket #' . $ticket->id)
@section('header', 'Ticket #' . $ticket->id)

@section('content')
<div class="max-w-3xl mx-auto space-y-5">

    <a href="{{ route('admin.tickets') }}" class="inline-flex items-center gap-1 text-sm transition-colors" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Tickets
    </a>

    @if(session('success'))
    <div class="px-4 py-3 rounded-lg text-sm flex items-center gap-2" style="background-color:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.3); color:#22D3EE;">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    @endif

    @php
    $priorityColors = ['urgent'=>'bg-red-100 text-red-700','high'=>'bg-orange-100 text-orange-700','medium'=>'bg-yellow-100 text-yellow-700','low'=>'bg-green-100 text-green-700'];
    @endphp

    <!-- Ticket detail -->
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <h3 class="text-lg font-semibold" style="color:#E5E7EB;">{{ $ticket->title }}</h3>
                <div class="flex gap-2 flex-wrap">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $priorityColors[$ticket->priority] ?? '' }}">{{ ucfirst($ticket->priority) }}</span>
                    @if($ticket->status==='open')<span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Open</span>
                    @elseif($ticket->status==='in_progress')<span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">In Progress</span>
                    @else<span class="px-2 py-1 text-xs font-semibold rounded-full" style="background-color:#0F172A; color:#94A3B8;">Closed</span>@endif
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mb-5">
                <div><span style="color:#94A3B8;">Customer:</span>
                    <a href="{{ route('admin.customers.show', $ticket->user) }}" class="ml-1 font-medium" style="color:#22D3EE;">{{ $ticket->user->name }}</a>
                </div>
                <div><span style="color:#94A3B8;">Email:</span> <span class="ml-1" style="color:#E5E7EB;">{{ $ticket->user->email }}</span></div>
                @if($ticket->category)<div><span style="color:#94A3B8;">Category:</span> <span class="ml-1" style="color:#E5E7EB;">{{ $ticket->category }}</span></div>@endif
                <div><span style="color:#94A3B8;">Submitted:</span> <span class="ml-1" style="color:#E5E7EB;">{{ $ticket->created_at->format('M d, Y h:i A') }}</span></div>
            </div>
            <div class="pt-4" style="border-top:1px solid #334155;">
                <p class="text-xs font-medium uppercase tracking-wider mb-2" style="color:#94A3B8;">Customer Message</p>
                <p class="text-sm whitespace-pre-wrap" style="color:#E5E7EB;">{{ $ticket->description }}</p>
            </div>
            @if($ticket->admin_reply)
            <div class="mt-4 pt-4" style="border-top:1px solid #334155;">
                <p class="text-xs font-medium uppercase tracking-wider mb-2" style="color:#94A3B8;">Admin Reply</p>
                <div class="p-3 rounded-lg text-sm whitespace-pre-wrap" style="background-color:rgba(34,211,238,0.08); color:#E5E7EB; border:1px solid rgba(34,211,238,0.2);">{{ $ticket->admin_reply }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Update form -->
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <h4 class="font-semibold" style="color:#E5E7EB;">Update Ticket</h4>
        </div>
        <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}" class="p-5 space-y-4">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Status</label>
                    <select name="status" class="w-full px-3 py-2.5 rounded-lg text-sm" style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;" onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                        <option value="open" {{ $ticket->status==='open'?'selected':'' }}>Open</option>
                        <option value="in_progress" {{ $ticket->status==='in_progress'?'selected':'' }}>In Progress</option>
                        <option value="closed" {{ $ticket->status==='closed'?'selected':'' }}>Closed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Priority</label>
                    <select name="priority" class="w-full px-3 py-2.5 rounded-lg text-sm" style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;" onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                        <option value="low" {{ $ticket->priority==='low'?'selected':'' }}>Low</option>
                        <option value="medium" {{ $ticket->priority==='medium'?'selected':'' }}>Medium</option>
                        <option value="high" {{ $ticket->priority==='high'?'selected':'' }}>High</option>
                        <option value="urgent" {{ $ticket->priority==='urgent'?'selected':'' }}>Urgent</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Admin Reply <span style="color:#94A3B8;" class="font-normal">(visible to customer)</span></label>
                <textarea name="admin_reply" rows="5" placeholder="Write your reply..."
                    class="w-full px-3 py-2.5 rounded-lg text-sm resize-none"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">{{ old('admin_reply', $ticket->admin_reply) }}</textarea>
            </div>
            <div class="flex flex-wrap gap-3 pt-1">
                <button type="submit" class="px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors" style="background-color:#22D3EE; color:#0F172A;" onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">Save Changes</button>
                <form method="POST" action="{{ route('admin.tickets.destroy', $ticket) }}" onsubmit="return confirm('Archive this ticket?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors" style="background-color:#334155; color:#94A3B8;" onmouseover="this.style.backgroundColor='#475569'" onmouseout="this.style.backgroundColor='#334155'">Archive</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
