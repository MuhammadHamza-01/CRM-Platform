@extends('layouts.dashboard')
@section('title', 'Customer Details')
@section('header', 'Customer Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Actions -->
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.customers.edit', $user) }}"
           class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150"
           style="background-color:#22D3EE; color:#0F172A;"
           onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
            Edit Customer
        </a>
        <a href="{{ route('admin.customers') }}"
           class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150"
           style="background-color:#334155; color:#E5E7EB;"
           onmouseover="this.style.backgroundColor='#475569'" onmouseout="this.style.backgroundColor='#334155'">
            ← Back to List
        </a>
    </div>

    <!-- Details card -->
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <h3 class="font-semibold" style="color:#E5E7EB;">Customer Information</h3>
        </div>
        <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Name</dt>
                <dd class="text-sm" style="color:#E5E7EB;">{{ $user->name }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Email</dt>
                <dd class="text-sm break-all" style="color:#E5E7EB;">{{ $user->email }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Joined</dt>
                <dd class="text-sm" style="color:#E5E7EB;">{{ $user->created_at->format('F j, Y') }}</dd>
            </div>
            <div>
                <dt class="text-xs font-medium uppercase tracking-wider mb-1" style="color:#94A3B8;">Last Login</dt>
                <dd class="text-sm" style="color:#E5E7EB;">{{ optional($user->last_login_at)->diffForHumans() ?? 'Never' }}</dd>
            </div>
        </div>
    </div>

    <!-- Tickets -->
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <h3 class="font-semibold" style="color:#E5E7EB;">Support Tickets</h3>
        </div>
        @if($user->tickets->count() > 0)
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr style="background-color:#0F172A;">
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Title</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->tickets as $ticket)
                    <tr style="border-top:1px solid #334155;">
                        <td class="px-5 py-3 text-sm" style="color:#E5E7EB;">{{ $ticket->title }}</td>
                        <td class="px-5 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : ($ticket->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '') }}"
                                style="{{ !in_array($ticket->status, ['open','in_progress']) ? 'background-color:#0F172A; color:#94A3B8;' : '' }}">
                                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $ticket->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="sm:hidden divide-y" style="border-color:#334155;">
            @foreach($user->tickets as $ticket)
            <div class="px-4 py-3 flex justify-between items-center">
                <div>
                    <p class="text-sm" style="color:#E5E7EB;">{{ $ticket->title }}</p>
                    <p class="text-xs mt-0.5" style="color:#94A3B8;">{{ $ticket->created_at->format('M d, Y') }}</p>
                </div>
                <span class="px-2 py-1 text-xs font-semibold rounded-full flex-shrink-0 ml-2
                    {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : ($ticket->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '') }}"
                    style="{{ !in_array($ticket->status, ['open','in_progress']) ? 'background-color:#0F172A; color:#94A3B8;' : '' }}">
                    {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                </span>
            </div>
            @endforeach
        </div>
        @else
        <p class="px-5 py-4 text-sm" style="color:#94A3B8;">No support tickets found.</p>
        @endif
    </div>
</div>
@endsection
