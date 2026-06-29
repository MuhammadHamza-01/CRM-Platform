@extends('layouts.app')

@section('content')
   <section class="hero-section relative flex items-center justify-center !bg-[#0F172A] text-center !text-[#E5E7EB]" style="min-height: 220px;">
  <!-- Content -->
  <div class="relative z-10 px-4 sm:px-6 max-w-2xl mx-auto">
    <h1 class="text-3xl sm:text-4xl font-extrabold mb-3 !text-[#94A3B8] leading-tight py-auto">
      Features of Elevated CRM
    </h1>
    <p class="text-sm sm:text-base mb-5 !text-[#94A3B8]">
      We’re redefining customer relationship management through innovation,
      technology, and trust.
    </p>
    
  </div>
</section>

    <!-- Main Features Section -->
    <section class="!bg-[#1E293B] py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Our Features</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Everything You Need
                </p>
                <p class="mt-6 text-lg leading-8 !text-[#94A3B8]">
                    Discover the powerful features that make our CRM the perfect choice for your business.
                </p>
            </div>

            <!-- Feature List -->
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <div class="grid grid-cols-1 gap-x-8 gap-y-16 lg:grid-cols-2">
                    <!-- Admin Features -->
                    <div class="lg:pr-8 lg:pt-4">
                        <div class="lg:max-w-lg">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 !bg-[rgba(34,211,238,0.15)] rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Admin Features</h2>
                                    <p class="mt-1 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">Complete Control</p>
                                </div>
                            </div>
                            <p class="mt-4 text-lg leading-8 !text-[#94A3B8]">
                                Powerful admin tools to manage your customer relationships effectively with full control and visibility.
                            </p>
                            <dl class="mt-8 space-y-6 text-base leading-7 !text-[#94A3B8]">
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 !text-[#22D3EE]" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Customer Management
                                    </dt>
                                    <dd class="mt-1">View and manage all customer accounts, data, and interaction history in one centralized dashboard.</dd>
                                </div>
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 !text-[#22D3EE]" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Analytics Dashboard
                                    </dt>
                                    <dd class="mt-1">Access detailed reports, performance metrics, and business intelligence with customizable dashboards.</dd>
                                </div>
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 !text-[#22D3EE]" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Team Management
                                    </dt>
                                    <dd class="mt-1">Manage user roles, permissions, and team collaboration with granular access controls.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Customer Features -->
                    <div class="lg:pr-8 lg:pt-4">
                        <div class="lg:max-w-lg">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-base font-semibold leading-7 text-green-600">Customer Features</h2>
                                    <p class="mt-1 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">Self-Service Portal</p>
                                </div>
                            </div>
                            <p class="mt-4 text-lg leading-8 !text-[#94A3B8]">
                                Empower your customers with a dedicated portal for seamless interactions and support.
                            </p>
                            <dl class="mt-8 space-y-6 text-base leading-7 !text-[#94A3B8]">
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-green-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Support Tickets
                                    </dt>
                                    <dd class="mt-1">Create, track, and manage support requests with real-time status updates and communication history.</dd>
                                </div>
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-green-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Profile Management
                                    </dt>
                                    <dd class="mt-1">Update personal information, communication preferences, and account settings with ease.</dd>
                                </div>
                                <div class="relative pl-9 !bg-[#1E293B] p-4 rounded-lg hover:bg-green-50 transition-colors duration-200">
                                    <dt class="font-semibold !text-[#E5E7EB]">
                                        <svg class="absolute left-3 top-4 h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Knowledge Base
                                    </dt>
                                    <dd class="mt-1">Access comprehensive documentation, FAQs, and self-help resources for instant solutions.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Features Grid -->
    <section class="!bg-[#1E293B] py-16 sm:py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Advanced Capabilities
                </h2>
                <p class="mt-4 text-lg !text-[#94A3B8] max-w-3xl mx-auto">
                    Beyond the basics, discover features that set our CRM apart from the competition.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">Sales Automation</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        Automate repetitive tasks, lead scoring, and follow-up sequences to boost sales productivity.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">Advanced Analytics</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        Deep insights with custom reporting, predictive analytics, and performance benchmarking.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 !bg-[rgba(34,211,238,0.15)] rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">API Integration</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        Seamlessly connect with your existing tools and platforms through robust API capabilities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    
@endsection