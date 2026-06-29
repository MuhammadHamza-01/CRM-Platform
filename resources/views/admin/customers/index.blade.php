@extends('layouts.dashboard')
@section('title', 'Customers')
@section('header', 'Customer Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <h2 class="text-lg font-semibold" style="color:#E5E7EB;">All Customers</h2>
        </div>

        <!-- Desktop table -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr style="background-color:#0F172A;">
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Name</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Email</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Joined</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Tickets</th>
                        <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color:#94A3B8;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr style="border-top:1px solid #334155;" onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">
                        <td class="px-5 py-3 text-sm font-medium" style="color:#E5E7EB;">{{ $customer->name }}</td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $customer->email }}</td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $customer->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3 text-sm" style="color:#94A3B8;">{{ $customer->tickets_count ?? 0 }}</td>
                        <td class="px-5 py-3 text-sm flex gap-3">
                            <a href="{{ route('admin.customers.show', $customer) }}" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">View</a>
                            <a href="{{ route('admin.customers.edit', $customer) }}" style="color:#34D399;" onmouseover="this.style.color='#10B981'" onmouseout="this.style.color='#34D399'">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile cards -->
        <div class="sm:hidden divide-y" style="border-color:#334155;">
            @foreach($customers as $customer)
            <div class="px-4 py-3">
                <div class="flex justify-between items-start">
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium truncate" style="color:#E5E7EB;">{{ $customer->name }}</p>
                        <p class="text-xs mt-0.5 truncate" style="color:#94A3B8;">{{ $customer->email }}</p>
                        <p class="text-xs mt-0.5" style="color:#94A3B8;">
                            Joined {{ $customer->created_at->format('M d, Y') }} · {{ $customer->tickets_count ?? 0 }} tickets
                        </p>
                    </div>
                    <div class="flex gap-3 ml-3 flex-shrink-0">
                        <a href="{{ route('admin.customers.show', $customer) }}" class="text-sm font-medium" style="color:#22D3EE;">View</a>
                        <a href="{{ route('admin.customers.edit', $customer) }}" class="text-sm font-medium" style="color:#34D399;">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="px-5 py-4" style="border-top:1px solid #334155;">{{ $customers->links() }}</div>
    </div>
</div>
@endsection
