@extends('layouts.dashboard')
@section('title', 'Support Tickets')
@section('header', 'Support Tickets')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4 flex flex-wrap items-center justify-between gap-3" style="border-bottom:1px solid #334155;">
            <h2 class="text-lg font-semibold" style="color:#E5E7EB;">My Tickets</h2>
            <a href="{{ route('customer.tickets.create') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors" style="background-color:#22D3EE; color:#0F172A;" onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">+ New Ticket</a>
        </div>

        @if($tickets->count() > 0)
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full">
                <thead><tr style="background-color:#0F172A;">
                    <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Title</th>
                    <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Created</th>
                    <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Action</th>
                </tr></thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr style="border-top:1px solid #334155;" onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">
                        <td class="px-5 py-3 text-sm font-medium" style="color:#E5E7EB;">{{ $ticket->title }}</td>
                        <td class="px-5 py-3"><span class="px-2 py-1 text-xs font-semibold rounded-full {{ $ticket->status==='open'?'bg-green-100 text-green-800':($ticket->status==='in_progress'?'bg-yellow-100 text-yellow-800':'') }}" style="{{ !in_array($ticket->status,['open','in_progress'])?'background-color:#0F172A;color:#94A3B8;':'' }}">{{ ucfirst(str_replace('_',' ',$ticket->status)) }}</span></td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $ticket->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3"><a href="{{ route('customer.tickets.show', $ticket) }}" class="text-sm font-medium" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="sm:hidden divide-y" style="border-color:#334155;">
            @foreach($tickets as $ticket)
            <div class="px-4 py-3 flex justify-between items-center gap-3">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium truncate" style="color:#E5E7EB;">{{ $ticket->title }}</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full {{ $ticket->status==='open'?'bg-green-100 text-green-800':($ticket->status==='in_progress'?'bg-yellow-100 text-yellow-800':'') }}" style="{{ !in_array($ticket->status,['open','in_progress'])?'background-color:#0F172A;color:#94A3B8;':'' }}">{{ ucfirst(str_replace('_',' ',$ticket->status)) }}</span>
                        <span class="text-xs" style="color:#94A3B8;">{{ $ticket->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                <a href="{{ route('customer.tickets.show', $ticket) }}" class="text-sm font-medium flex-shrink-0" style="color:#22D3EE;">View</a>
            </div>
            @endforeach
        </div>
        <div class="px-5 py-4" style="border-top:1px solid #334155;">{{ $tickets->links() }}</div>
        @else
        <div class="px-5 py-12 text-center">
            <svg class="w-12 h-12 mx-auto mb-3" style="color:#334155;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
            <p class="text-sm mb-4" style="color:#94A3B8;">No tickets yet.</p>
            <a href="{{ route('customer.tickets.create') }}" class="px-4 py-2 rounded-lg text-sm font-semibold" style="background-color:#22D3EE; color:#0F172A;">Create First Ticket</a>
        </div>
        @endif
    </div>
</div>
@endsection
