@extends('layouts.dashboard')
@section('title', 'Reports & Analytics')
@section('header', 'Reports & Analytics')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Period filter -->
    <div class="flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-xl font-semibold" style="color:#E5E7EB;">Reports & Analytics</h1>
        <form method="GET" action="{{ route('admin.reports') }}" class="flex items-center gap-2">
            <label class="text-sm" style="color:#94A3B8;">Period:</label>
            <select name="period" onchange="this.form.submit()" class="px-3 py-2 rounded-lg text-sm" style="background-color:#1E293B; border:1px solid #334155; color:#E5E7EB; outline:none;">
                @foreach(['7'=>'Last 7 days','30'=>'Last 30 days','90'=>'Last 90 days','365'=>'Last year'] as $v=>$l)
                <option value="{{ $v }}" {{ $period==$v ? 'selected':'' }}>{{ $l }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php $kpis = [
            ['label'=>'New Tickets',    'val'=>$newTickets,        'color'=>'#22D3EE', 'border'=>'border-l-4 border-blue-500'],
            ['label'=>'Resolved',       'val'=>$resolvedTickets,   'color'=>'#34D399', 'border'=>'border-l-4 border-green-500'],
            ['label'=>'Avg Resolution', 'val'=>($avgResolutionDays ? number_format($avgResolutionDays,1).'d' : '—'), 'color'=>'#FBBF24', 'border'=>'border-l-4 border-yellow-500'],
            ['label'=>'New Customers',  'val'=>$newCustomers,      'color'=>'#818CF8', 'border'=>'border-l-4 border-purple-500'],
        ]; @endphp
        @foreach($kpis as $k)
        <div class="rounded-xl p-4 {{ $k['border'] }}" style="background-color:#1E293B;">
            <div class="text-xs font-medium uppercase tracking-wide" style="color:#94A3B8;">{{ $k['label'] }}</div>
            <div class="text-3xl font-bold mt-1" style="color:{{ $k['color'] }};">{{ $k['val'] }}</div>
            <div class="text-xs mt-1" style="color:#94A3B8;">in {{ $period }} days</div>
        </div>
        @endforeach
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rounded-xl p-5" style="background-color:#1E293B; border:1px solid #334155;">
            <h3 class="text-sm font-semibold mb-4" style="color:#E5E7EB;">Daily Ticket Volume (Last 14 Days)</h3>
            <div class="relative" style="height:200px;"><canvas id="volumeChart"></canvas></div>
        </div>
        <div class="rounded-xl p-5" style="background-color:#1E293B; border:1px solid #334155;">
            <h3 class="text-sm font-semibold mb-4" style="color:#E5E7EB;">Tickets by Priority</h3>
            <div class="relative" style="height:200px;"><canvas id="priorityChart"></canvas></div>
        </div>
    </div>

    <!-- Bottom row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @if($byCategory->count() > 0)
        <div class="rounded-xl p-5" style="background-color:#1E293B; border:1px solid #334155;">
            <h3 class="text-sm font-semibold mb-4" style="color:#E5E7EB;">Tickets by Category</h3>
            <div class="space-y-3">
                @php $maxCat = $byCategory->max(); @endphp
                @foreach($byCategory as $cat => $count)
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="capitalize" style="color:#E5E7EB;">{{ $cat ?: 'Uncategorized' }}</span>
                        <span class="font-medium" style="color:#E5E7EB;">{{ $count }}</span>
                    </div>
                    <div class="w-full rounded-full h-2" style="background-color:#0F172A;">
                        <div class="h-2 rounded-full" style="background-color:#22D3EE; width:{{ $maxCat>0 ? ($count/$maxCat*100) : 0 }}%;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        
                   
            <!-- Mobile -->
            <div class="sm:hidden space-y-2">
                @foreach($topCustomers as $customer)
                <div class="flex justify-between items-center py-2" style="border-bottom:1px solid #334155;">
                    <div>
                        <a href="{{ route('admin.customers.show', $customer) }}" class="text-sm" style="color:#22D3EE;">{{ $customer->name }}</a>
                        <div class="text-xs" style="color:#94A3B8;">{{ $customer->email }}</div>
                    </div>
                    <span class="text-sm font-bold" style="color:#E5E7EB;">{{ $customer->tickets_count }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Chart.defaults.color = '#94A3B8';
    Chart.defaults.borderColor = '#334155';

    new Chart(document.getElementById('volumeChart'), {
        type: 'bar',
        data: {
            labels: @json($dailyVolume->pluck('date')),
            datasets: [{ label: 'Tickets', data: @json($dailyVolume->pluck('count')),
                backgroundColor: 'rgba(34,211,238,0.5)', borderColor: '#22D3EE', borderWidth: 1, borderRadius: 4 }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });

    new Chart(document.getElementById('priorityChart'), {
        type: 'doughnut',
        data: {
            labels: ['Urgent','High','Medium','Low'],
            datasets: [{ data: [@json($byPriority)['urgent']??0, @json($byPriority)['high']??0, @json($byPriority)['medium']??0, @json($byPriority)['low']??0],
                backgroundColor: ['#EF4444','#F97316','#EAB308','#22C55E'], borderWidth: 2, borderColor: '#1E293B' }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right', labels: { boxWidth: 12, padding: 10 } } } }
    });
});
</script>
@endsection
