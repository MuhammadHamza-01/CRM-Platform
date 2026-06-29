@extends('layouts.dashboard')
@section('title', 'Support Tickets')
@section('header', 'Support Tickets')

@section('content')
<div class="max-w-7xl mx-auto space-y-5">

    @if(session('success'))
    <div class="px-4 py-3 rounded-lg text-sm flex items-center gap-2" style="background-color:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.3); color:#22D3EE;">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        @php $statCards = [
            ['label'=>'Total',       'val'=>$stats['total'],       'color'=>'#22D3EE', 'border'=>'#22D3EE'],
            ['label'=>'Open',        'val'=>$stats['open'],        'color'=>'#34D399', 'border'=>'#34D399'],
            ['label'=>'In Progress', 'val'=>$stats['in_progress'], 'color'=>'#FBBF24', 'border'=>'#FBBF24'],
            ['label'=>'Closed',      'val'=>$stats['closed'],      'color'=>'#94A3B8', 'border'=>'#475569'],
            ['label'=>'Urgent',      'val'=>$stats['urgent'],      'color'=>'#F87171', 'border'=>'#F87171'],
        ]; @endphp
        @foreach($statCards as $s)
        <div class="rounded-xl p-4" style="background-color:#1E293B; border-left:3px solid {{ $s['border'] }};">
            <div class="text-xs" style="color:#94A3B8;">{{ $s['label'] }}</div>
            <div class="text-2xl font-bold mt-1" style="color:{{ $s['color'] }};">{{ $s['val'] }}</div>
        </div>
        @endforeach
    </div>

    <!-- Filters -->
    <div class="rounded-xl p-4" style="background-color:#1E293B; border:1px solid #334155;">
        <form method="GET" action="{{ route('admin.tickets') }}" class="flex flex-col sm:flex-row flex-wrap gap-3">
            <div class="flex-1 min-w-0">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search tickets..."
                    class="w-full px-3 py-2 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
            </div>
            <select name="status" class="px-3 py-2 rounded-lg text-sm" style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;">
                <option value="">All Statuses</option>
                <option value="open" {{ request('status')==='open' ? 'selected':'' }}>Open</option>
                <option value="in_progress" {{ request('status')==='in_progress' ? 'selected':'' }}>In Progress</option>
                <option value="closed" {{ request('status')==='closed' ? 'selected':'' }}>Closed</option>
            </select>
            <select name="priority" class="px-3 py-2 rounded-lg text-sm" style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;">
                <option value="">All Priorities</option>
                <option value="urgent" {{ request('priority')==='urgent' ? 'selected':'' }}>Urgent</option>
                <option value="high" {{ request('priority')==='high' ? 'selected':'' }}>High</option>
                <option value="medium" {{ request('priority')==='medium' ? 'selected':'' }}>Medium</option>
                <option value="low" {{ request('priority')==='low' ? 'selected':'' }}>Low</option>
            </select>
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors" style="background-color:#22D3EE; color:#0F172A;" onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">Filter</button>
                @if(request()->hasAny(['search','status','priority']))
                <a href="{{ route('admin.tickets') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors" style="background-color:#334155; color:#E5E7EB;" onmouseover="this.style.backgroundColor='#475569'" onmouseout="this.style.backgroundColor='#334155'">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Tickets -->
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <h3 class="font-semibold" style="color:#E5E7EB;">All Tickets
                @if(request()->hasAny(['search','status','priority']))
                <span class="text-xs font-normal ml-2" style="color:#94A3B8;">({{ $tickets->total() }} results)</span>
                @endif
            </h3>
        </div>

        @php
        $priorityColors = ['urgent'=>'bg-red-100 text-red-700','high'=>'bg-orange-100 text-orange-700','medium'=>'bg-yellow-100 text-yellow-700','low'=>'bg-green-100 text-green-700'];
        @endphp

        <!-- Desktop table -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr style="background-color:#0F172A;">
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">#</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Customer</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Title</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Priority</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Created</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $ticket)
                    <tr style="border-top:1px solid #334155;" onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $ticket->id }}</td>
                        <td class="px-5 py-3">
                            <div class="text-sm" style="color:#E5E7EB;">{{ $ticket->user->name }}</div>
                            <div class="text-xs" style="color:#94A3B8;">{{ $ticket->user->email }}</div>
                        </td>
                        <td class="px-5 py-3 text-sm max-w-xs truncate" style="color:#E5E7EB;">{{ $ticket->title }}</td>
                        <td class="px-5 py-3"><span class="px-2 py-1 text-xs font-semibold rounded-full {{ $priorityColors[$ticket->priority] ?? '' }}">{{ ucfirst($ticket->priority) }}</span></td>
                        <td class="px-5 py-3">
                            @if($ticket->status==='open')<span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Open</span>
                            @elseif($ticket->status==='in_progress')<span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">In Progress</span>
                            @else<span class="px-2 py-1 text-xs font-semibold rounded-full" style="background-color:#0F172A; color:#94A3B8;">Closed</span>@endif
                        </td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $ticket->created_at->diffForHumans() }}</td>
                        <td class="px-5 py-3"><a href="{{ route('admin.tickets.show', $ticket) }}" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'" class="text-sm font-medium">View</a></td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="px-5 py-12 text-center text-sm" style="color:#94A3B8;">No tickets found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile cards -->
        <div class="md:hidden divide-y" style="border-color:#334155;">
            @forelse($tickets as $ticket)
            <div class="px-4 py-4">
                <div class="flex justify-between items-start gap-2">
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium truncate" style="color:#E5E7EB;">{{ $ticket->title }}</p>
                        <p class="text-xs mt-1" style="color:#94A3B8;">{{ $ticket->user->name }} · {{ $ticket->created_at->diffForHumans() }}</p>
                        <div class="flex gap-2 mt-2 flex-wrap">
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full {{ $priorityColors[$ticket->priority] ?? '' }}">{{ ucfirst($ticket->priority) }}</span>
                            @if($ticket->status==='open')<span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-700">Open</span>
                            @elseif($ticket->status==='in_progress')<span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">In Progress</span>
                            @else<span class="px-2 py-0.5 text-xs font-semibold rounded-full" style="background-color:#0F172A; color:#94A3B8;">Closed</span>@endif
                        </div>
                    </div>
                    <a href="{{ route('admin.tickets.show', $ticket) }}" class="text-sm font-medium flex-shrink-0" style="color:#22D3EE;">View</a>
                </div>
            </div>
            @empty
            <div class="px-4 py-12 text-center text-sm" style="color:#94A3B8;">No tickets found.</div>
            @endforelse
        </div>

        <div class="px-5 py-4" style="border-top:1px solid #334155;">{{ $tickets->links() }}</div>
    </div>
</div>
@endsection
