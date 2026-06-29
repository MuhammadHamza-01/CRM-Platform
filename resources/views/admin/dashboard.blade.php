@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('header', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl p-5 flex items-center gap-4" style="background-color:#1E293B; border-left:4px solid #22D3EE; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
            <div class="p-3 rounded-lg flex-shrink-0" style="background-color:rgba(34,211,238,0.15);">
                <svg class="h-7 w-7" style="color:#22D3EE;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <div class="text-xs font-medium" style="color:#94A3B8;">Total Customers</div>
                <div class="text-3xl font-bold" style="color:#22D3EE;">{{ $totalCustomers }}</div>
            </div>
        </div>
        <div class="rounded-xl p-5 flex items-center gap-4" style="background-color:#1E293B; border-left:4px solid #818CF8; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
            <div class="p-3 rounded-lg flex-shrink-0" style="background-color:rgba(129,140,248,0.15);">
                <svg class="h-7 w-7" style="color:#818CF8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <div class="text-xs font-medium" style="color:#94A3B8;">New Customers</div>
                <div class="text-3xl font-bold" style="color:#818CF8;">{{ $activeThisMonth }}</div>
            </div>
        </div>
        <div class="rounded-xl p-5 flex items-center gap-4" style="background-color:#1E293B; border-left:4px solid #F87171; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
            <div class="p-3 rounded-lg flex-shrink-0" style="background-color:rgba(248,113,113,0.15);">
                <svg class="h-7 w-7" style="color:#F87171;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <div>
                <div class="text-xs font-medium" style="color:#94A3B8;">Support Tickets</div>
                <div class="text-3xl font-bold" style="color:#F87171;">{{ $totalTickets }}</div>
                <div class="text-xs" style="color:#94A3B8;">{{ $openTickets }} open</div>
            </div>
        </div>
    </div>

    <!-- Recent Customers -->
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
        <div class="px-5 py-4 flex items-center justify-between" style="border-bottom:1px solid #334155;">
            <h3 class="font-semibold" style="color:#E5E7EB;">Recent Customers</h3>
            <a href="{{ route('admin.customers') }}" class="text-xs font-medium transition-colors" style="color:#22D3EE;">View all →</a>
        </div>

        <!-- Desktop table -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr style="background-color:#0F172A;">
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Name</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Email</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Joined</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentCustomers as $customer)
                    <tr style="border-top:1px solid #334155;" onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">
                        <td class="px-5 py-3 text-sm font-medium" style="color:#E5E7EB;">{{ $customer->name }}</td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $customer->email }}</td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $customer->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3 text-sm">
                            <a href="{{ route('admin.customers.show', $customer) }}" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile cards -->
        <div class="sm:hidden divide-y" style="border-color:#334155;">
            @foreach($recentCustomers as $customer)
            <div class="px-4 py-3">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium" style="color:#E5E7EB;">{{ $customer->name }}</p>
                        <p class="text-xs mt-0.5" style="color:#94A3B8;">{{ $customer->email }}</p>
                        <p class="text-xs mt-0.5" style="color:#94A3B8;">{{ $customer->created_at->format('M d, Y') }}</p>
                    </div>
                    <a href="{{ route('admin.customers.show', $customer) }}" class="text-sm font-medium" style="color:#22D3EE;">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
