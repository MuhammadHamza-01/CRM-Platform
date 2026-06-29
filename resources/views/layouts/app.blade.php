<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ElevatedCRM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" style="background-color:#0F172A; color:#E5E7EB;">

<header class="fixed top-0 left-0 w-full z-50" style="background-color:#1E293B; border-bottom:1px solid #334155; box-shadow:0 2px 10px rgba(0,0,0,0.4);">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0"><img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-14 w-auto"></a>

            <!-- Desktop nav -->
            <div class="hidden md:flex items-center gap-1">
                @foreach(['home'=>'Home','about'=>'About','services'=>'Services','features'=>'Features','contact'=>'Contact'] as $r=>$l)
                <a href="{{ route($r) }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150"
                   style="{{ request()->routeIs($r) ? 'color:#22D3EE; background-color:rgba(34,211,238,0.1);' : 'color:#94A3B8;' }}"
                   onmouseover="this.style.color='#E5E7EB'" onmouseout="this.style.color='{{ request()->routeIs($r) ? '#22D3EE' : '#94A3B8' }}'">{{ $l }}</a>
                @endforeach
            </div>

            <div class="flex items-center gap-2">
                <!-- Desktop auth -->
                <div class="hidden md:flex items-center gap-2">
                    @guest
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md text-sm font-semibold transition-colors" style="background-color:rgba(34,211,238,0.15); color:#22D3EE; border:1px solid rgba(34,211,238,0.3);" onmouseover="this.style.backgroundColor='rgba(34,211,238,0.25)'" onmouseout="this.style.backgroundColor='rgba(34,211,238,0.15)'">Sign Up</a>
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-sm font-semibold transition-colors" style="background-color:#22D3EE; color:#0F172A;" onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">Login</a>
                    @else
                        <a href="{{ auth()->user()->role==='admin' ? route('admin.dashboard') : route('customer.dashboard') }}" class="px-4 py-2 rounded-md text-sm font-semibold" style="background-color:#22D3EE; color:#0F172A;">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">@csrf
                            <button type="submit" class="px-4 py-2 rounded-md text-sm font-semibold" style="background-color:#334155; color:#E5E7EB;">Logout</button>
                        </form>
                    @endguest
                </div>

                <!-- Mobile hamburger -->
                <button id="nav-toggle" class="md:hidden p-2 rounded-lg" style="color:#E5E7EB;">
                    <svg id="nav-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="nav-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col gap-1 pt-2" style="border-top:1px solid #334155;">
                @foreach(['home'=>'Home','about'=>'About','services'=>'Services','features'=>'Features','contact'=>'Contact'] as $r=>$l)
                <a href="{{ route($r) }}" class="px-3 py-2 rounded-md text-sm font-medium" style="{{ request()->routeIs($r) ? 'color:#22D3EE; background-color:rgba(34,211,238,0.1);' : 'color:#94A3B8;' }}" onclick="closeMobileNav()">{{ $l }}</a>
                @endforeach
                <div class="flex gap-2 mt-2 pt-2" style="border-top:1px solid #334155;">
                    @guest
                        <a href="{{ route('register') }}" class="flex-1 text-center px-4 py-2 rounded-md text-sm font-semibold" style="background-color:rgba(34,211,238,0.15); color:#22D3EE; border:1px solid rgba(34,211,238,0.3);">Sign Up</a>
                        <a href="{{ route('login') }}" class="flex-1 text-center px-4 py-2 rounded-md text-sm font-semibold" style="background-color:#22D3EE; color:#0F172A;">Login</a>
                    @else
                        <a href="{{ auth()->user()->role==='admin' ? route('admin.dashboard') : route('customer.dashboard') }}" class="flex-1 text-center px-4 py-2 rounded-md text-sm font-semibold" style="background-color:#22D3EE; color:#0F172A;">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="flex-1">@csrf
                            <button type="submit" class="w-full px-4 py-2 rounded-md text-sm font-semibold" style="background-color:#334155; color:#E5E7EB;">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="h-16"></div>
<main>@yield('content')</main>

<footer style="background-color:#1E293B; border-top:1px solid #334155;">
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="col-span-2 md:col-span-1">
                <img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-16 w-auto mb-3">
                <p class="text-sm" style="color:#94A3B8;">Your trusted CRM solution for managing customer relationships effectively.</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold mb-3 uppercase tracking-wider" style="color:#E5E7EB;">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    @foreach(['home'=>'Home','about'=>'About','services'=>'Services','contact'=>'Contact'] as $r=>$l)
                    <li><a href="{{ route($r) }}" style="color:#94A3B8;" onmouseover="this.style.color='#E5E7EB'" onmouseout="this.style.color='#94A3B8'">{{ $l }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold mb-3 uppercase tracking-wider" style="color:#E5E7EB;">Contact</h3>
                <ul class="space-y-2 text-sm" style="color:#94A3B8;">
                    <li>info@elevatedcrm.com</li>
                    <li>(123) 456-7890</li>
                    <li>123 CRM Street</li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold mb-3 uppercase tracking-wider" style="color:#E5E7EB;">Follow Us</h3>
                <div class="flex gap-3">
                    @foreach(['M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z', 'M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z', 'M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z'] as $path)
                    <a href="#" style="color:#94A3B8;" onmouseover="this.style.color='#22D3EE'" onmouseout="this.style.color='#94A3B8'">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-8 pt-6 text-center text-sm" style="border-top:1px solid #334155; color:#94A3B8;">
            &copy; {{ date('Y') }} ElevatedCRM. All rights reserved.
        </div>
    </div>
</footer>

<script>
const navToggle = document.getElementById('nav-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const navOpen = document.getElementById('nav-open');
const navClose = document.getElementById('nav-close');
function closeMobileNav() {
    mobileMenu.classList.add('hidden');
    navOpen.classList.remove('hidden');
    navClose.classList.add('hidden');
}
navToggle.addEventListener('click', () => {
    const isOpen = !mobileMenu.classList.contains('hidden');
    if (isOpen) { closeMobileNav(); }
    else {
        mobileMenu.classList.remove('hidden');
        navOpen.classList.add('hidden');
        navClose.classList.remove('hidden');
    }
});
window.addEventListener('resize', () => { if (window.innerWidth >= 768) closeMobileNav(); });
</script>
</body>
</html>
