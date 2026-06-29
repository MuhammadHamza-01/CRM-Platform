@extends('layouts.dashboard')
@section('title', 'Ticket Details')
@section('header', 'Ticket Details')

@section('content')
<div class="max-w-2xl mx-auto space-y-5">
    <a href="{{ route('customer.tickets') }}" class="inline-flex items-center gap-1 text-sm" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Tickets
    </a>

    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <div class="flex flex-wrap items-start justify-between gap-2">
                <h2 class="text-lg font-semibold" style="color:#E5E7EB;">{{ $ticket->title }}</h2>
                <span class="px-2 py-1 text-xs font-semibold rounded-full flex-shrink-0
                    {{ $ticket->status==='open' ? 'bg-green-100 text-green-800' : ($ticket->status==='in_progress' ? 'bg-yellow-100 text-yellow-800' : '') }}"
                    style="{{ !in_array($ticket->status,['open','in_progress']) ? 'background-color:#0F172A;color:#94A3B8;' : '' }}">
                    {{ ucfirst(str_replace('_',' ',$ticket->status)) }}
                </span>
            </div>
        </div>

        <div class="p-5 space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Created</dt>
                    <dd class="text-sm" style="color:#E5E7EB;">{{ $ticket->created_at->format('F j, Y g:i A') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Last Updated</dt>
                    <dd class="text-sm" style="color:#E5E7EB;">{{ $ticket->updated_at->format('F j, Y g:i A') }}</dd>
                </div>
            </div>

            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-2" style="color:#94A3B8;">Your Message</dt>
                <dd class="text-sm whitespace-pre-line p-3 rounded-lg" style="color:#E5E7EB; background-color:#0F172A; border:1px solid #334155;">{{ $ticket->description }}</dd>
            </div>

            @if($ticket->admin_reply)
            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-2" style="color:#94A3B8;">Support Reply</dt>
                <dd class="text-sm whitespace-pre-line p-3 rounded-lg" style="color:#E5E7EB; background-color:rgba(34,211,238,0.07); border:1px solid rgba(34,211,238,0.2);">{{ $ticket->admin_reply }}</dd>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
