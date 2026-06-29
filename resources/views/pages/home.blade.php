@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative overflow-hidden" style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);">
        <!-- Decorative glow -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div style="position:absolute; top:-10%; left:50%; transform:translateX(-50%); width:600px; height:600px; background:radial-gradient(circle, rgba(34,211,238,0.08) 0%, transparent 70%); border-radius:50%;"></div>
        </div>
        <div class="relative pt-6 pb-16 sm:pb-24">
            <main class="mx-auto mt-16 max-w-7xl px-4 sm:mt-24">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl" style="color:#E5E7EB;">
                    
                        <span class="block" style="color:#22D3EE;">ElevatedCRM</span>
                    </h1>
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl" style="color:#E5E7EB;">
                        <span class="block">Welcome to</span>
                        <span class="block" style="color:#22D3EE;">Our CRM Solution</span>
                    </h1>
                    <p class="mx-auto mt-3 max-w-md text-base sm:text-lg md:mt-5 md:max-w-3xl md:text-xl" style="color:#94A3B8;">
                        Streamline your customer relationships with our powerful CRM platform. Manage customer data, track interactions, and improve customer satisfaction.
                    </p>
                    <div class="mx-auto mt-5 max-w-md sm:flex sm:justify-center md:mt-8 gap-4">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" 
                               class="flex w-full items-center justify-center rounded-md px-8 py-3 text-base font-semibold md:py-4 md:px-10 md:text-lg transition-colors duration-150"
                               style="background-color:#22D3EE; color:#0F172A;"
                               onmouseover="this.style.backgroundColor='#06B6D4'"
                               onmouseout="this.style.backgroundColor='#22D3EE'">
                                Get Started
                            </a>
                        </div>
                        <div class="mt-3 rounded-md sm:mt-0">
                            <a href="{{ route('login') }}" 
                               class="flex w-full items-center justify-center rounded-md px-8 py-3 text-base font-semibold md:py-4 md:px-10 md:text-lg transition-colors duration-150"
                               style="border:1px solid #334155; color:#E5E7EB; background-color:transparent;"
                               onmouseover="this.style.backgroundColor='#1E293B'"
                               onmouseout="this.style.backgroundColor='transparent'">
                                Sign In
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <h2 class="text-base text-center font-semibold leading-7 pt-8" style="color:#818CF8;">Why Choose Us</h2>

    <!-- Features Section -->
    <div id="features" class="py-16 sm:py-24" style="background-color:#0F172A;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold sm:text-4xl" style="color:#E5E7EB;">
                    Everything you need to manage your customers
                </h2>
                <p class="mt-4 text-lg" style="color:#94A3B8;">
                    Powerful features designed to help you build stronger customer relationships and grow your business.
                </p>
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @php
                    $features = [
                        ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z', 'title' => 'Customer Management', 'desc' => 'Efficiently manage customer data, interactions, and history all in one place with our intuitive interface.'],
                        ['icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z', 'title' => 'Support System', 'desc' => 'Built-in support ticket system to handle customer inquiries efficiently and improve response times.'],
                        ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Analytics & Reporting', 'desc' => 'Powerful analytics and reporting to track customer interactions and business growth with customizable dashboards.'],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Sales Automation', 'desc' => 'Automate your sales processes with workflow automation, lead scoring, and pipeline management.'],
                        ['icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z', 'title' => 'Cloud Integration', 'desc' => 'Seamlessly integrate with your favorite tools and services through our robust API and pre-built connectors.'],
                        ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'title' => 'Security First', 'desc' => 'Enterprise-grade security with encryption, role-based access control, and compliance with industry standards.'],
                    ];
                    @endphp
                    @foreach($features as $feature)
                    <div class="pt-6 reveal">
                        <div class="flow-root rounded-xl px-6 pb-8 transition-all duration-300" style="background-color:#1E293B; border:1px solid #334155;" onmouseover="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 20px rgba(34,211,238,0.1)'" onmouseout="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                            <div class="-mt-6">
                                <div class="inline-flex items-center justify-center p-3 rounded-md shadow-lg" style="background-color:rgba(34,211,238,0.15); border:1px solid rgba(34,211,238,0.3);">
                                    <svg class="h-6 w-6" style="color:#22D3EE;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}" />
                                    </svg>
                                </div>
                                <h3 class="mt-8 text-lg font-medium tracking-tight" style="color:#E5E7EB;">{{ $feature['title'] }}</h3>
                                <p class="mt-5 text-base" style="color:#94A3B8;">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-16 sm:py-24" style="background-color:#1E293B;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold" style="color:#E5E7EB;">Trusted by Businesses Worldwide</h2>
                <p class="mt-4 text-lg" style="color:#94A3B8;">See what our customers are saying about ElevatedCRM</p>
            </div>
            <div class="mt-16 grid gap-8 lg:grid-cols-3">
                @php
                $testimonials = [
                    ['name' => 'Sarah Johnson', 'role' => 'CEO, TechSolutions Inc.', 'img' => 'https://i.pinimg.com/736x/54/aa/14/54aa1482ba40a7c3880bc4aed0fe202d.jpg', 'text' => 'ElevatedCRM transformed how we manage customer relationships. Our team\'s productivity increased by 40% within the first month!'],
                    ['name' => 'Michael Chen', 'role' => 'Sales Director, GlobalRetail', 'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80', 'text' => 'The analytics and reporting features gave us insights we never had before. We\'ve improved our conversion rates by 25%.'],
                    ['name' => 'Emily Rodriguez', 'role' => 'Customer Success Manager, ServicePro', 'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80', 'text' => 'The support system integration has cut our response times in half. Our customer satisfaction scores have never been higher.'],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div class="p-8 rounded-xl" style="background-color:#0F172A; border:1px solid #334155;">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" style="border:2px solid #334155;" src="{{ $t['img'] }}" alt="{{ $t['name'] }}">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold" style="color:#E5E7EB;">{{ $t['name'] }}</h4>
                            <p style="color:#818CF8;">{{ $t['role'] }}</p>
                        </div>
                    </div>
                    <p class="mt-4" style="color:#94A3B8;">
                        "{{ $t['text'] }}"
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
