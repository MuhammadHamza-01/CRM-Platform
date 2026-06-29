<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ElevatedCRM') }} - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" style="background-color:#0F172A; color:#E5E7EB;">

<!-- Mobile top bar -->
<div class="lg:hidden flex items-center justify-between px-4 h-14 sticky top-0 z-40"
     style="background-color:#1E293B; border-bottom:1px solid #334155;">
    <img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-12 w-auto">
    <button id="sidebar-toggle" class="p-2 rounded-lg" style="color:#E5E7EB;">
        <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

<!-- Backdrop -->
<div id="sidebar-backdrop" class="fixed inset-0 z-30 bg-black bg-opacity-50 hidden lg:hidden"></div>

<div class="flex min-h-screen" style="background-color:#0F172A;">

    <!-- Sidebar -->
    <aside id="sidebar"
           class="fixed inset-y-0 left-0 z-40 w-64 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out"
           style="background-color:#1E293B; border-right:1px solid #334155;">

        <!-- Logo -->
        <div class="flex h-16 items-center justify-center flex-shrink-0 gap-2" style="border-bottom:1px solid #334155;">
            <img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-14 w-auto">
            <span class="text-sm font-semibold" style="color:#94A3B8;">
                {{ auth()->user()->role === 'admin' ? 'Admin' : 'Customer' }}
            </span>
        </div>

        <!-- Nav links -->
        <nav class="flex-1 overflow-y-auto py-4 space-y-1 px-3">

            @php
            function navLink($route, $label, $icon, $match = null) {
                $active = $match ? request()->routeIs($match) : request()->routeIs($route);
                $activeStyle = $active ? 'background-color:#273549; color:#22D3EE;' : 'color:#E5E7EB;';
                $hoverOut    = $active ? 'background-color:#273549' : 'transparent';
                echo '<a href="'.route($route).'"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150"
                    style="'.$activeStyle.'"
                    onmouseover="this.style.backgroundColor=\'#273549\'"
                    onmouseout="this.style.backgroundColor=\''.$hoverOut.'\'"
                    onclick="closeSidebar()">
                    '.$icon.'
                    '.$label.'
                </a>';
            }
            $icons = [
                'dashboard' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>',
                'customers' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>',
                'tickets'   => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>',
                'reports'   => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>',
                'activities'=> '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>',
                'tasks'     => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>',
                'profile'   => '<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>',
            ];
            @endphp

            @if(auth()->user()->role === 'admin')
                {!! navLink('admin.dashboard', 'Dashboard', $icons['dashboard'], 'admin.dashboard') !!}
                {!! navLink('admin.customers', 'Customers', $icons['customers'], 'admin.customers*') !!}
                {!! navLink('admin.tickets',   'Support Tickets', $icons['tickets'],   'admin.tickets*') !!}
                {!! navLink('admin.reports',   'Reports', $icons['reports'],   'admin.reports*') !!}
            @else
                {!! navLink('customer.dashboard', 'Dashboard',       $icons['dashboard'], 'customer.dashboard') !!}
                {!! navLink('customer.tickets',   'Support Tickets', $icons['tickets'],   'customer.tickets*') !!}
            @endif

            <div class="pt-2" style="border-top:1px solid #334155; margin-top:8px;"></div>

            {!! navLink('activities.index', 'Activities', $icons['activities'], 'activities*') !!}
            {!! navLink('tasks.index',      'My Tasks',   $icons['tasks'],      'tasks*') !!}
            {!! navLink('profile',          'Profile',    $icons['profile'],    'profile') !!}
        </nav>

        <!-- Logout at bottom -->
        <div class="p-4 flex-shrink-0" style="border-top:1px solid #334155;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150"
                    style="color:#94A3B8;"
                    onmouseover="this.style.backgroundColor='#273549'; this.style.color='#F87171'"
                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main area -->
    <div class="flex-1 flex flex-col min-w-0 lg:ml-64">

        <!-- Desktop top header -->
        <header class="hidden lg:flex items-center justify-between px-6 h-16 flex-shrink-0"
                style="background-color:#1E293B; border-bottom:1px solid #334155; box-shadow:0 1px 8px rgba(0,0,0,0.4);">
            <h2 class="text-xl font-semibold" style="color:#E5E7EB;">@yield('header', 'Dashboard')</h2>
            <div class="flex items-center gap-3">
                <span class="text-sm" style="color:#94A3B8;">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150"
                        style="background-color:#334155; color:#E5E7EB;"
                        onmouseover="this.style.backgroundColor='#475569'"
                        onmouseout="this.style.backgroundColor='#334155'">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 p-4 sm:p-6" style="background-color:#0F172A;">
            <!-- Mobile page title -->
            <h2 class="lg:hidden text-lg font-semibold mb-4" style="color:#E5E7EB;">@yield('header', 'Dashboard')</h2>
            @yield('content')
        </main>
    </div>
</div>

<script>
const sidebar   = document.getElementById('sidebar');
const backdrop  = document.getElementById('sidebar-backdrop');
const menuIcon  = document.getElementById('menu-icon');
const closeIcon = document.getElementById('close-icon');

function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    backdrop.classList.remove('hidden');
    menuIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeSidebar() {
    sidebar.classList.add('-translate-x-full');
    backdrop.classList.add('hidden');
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
    document.body.style.overflow = '';
}
document.getElementById('sidebar-toggle').addEventListener('click', () => {
    sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebar();
});
backdrop.addEventListener('click', closeSidebar);
// Close on resize to desktop
window.addEventListener('resize', () => { if (window.innerWidth >= 1024) closeSidebar(); });
</script>
</body>
</html>
