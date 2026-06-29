@extends('layouts.app')

@section('content')
  
<section class="hero-section relative flex items-center justify-center !bg-[#0F172A] text-center !text-[#E5E7EB]" style="min-height: 220px;">
  <!-- Content -->
  <div class="relative z-10 px-4 sm:px-6 max-w-2xl mx-auto">
    <h1 class="text-3xl sm:text-4xl font-extrabold mb-3 !text-[#94A3B8] leading-tight py-auto">
      Services by Elevated CRM
    </h1>
    <p class="text-sm sm:text-base mb-5 !text-[#94A3B8]">
      We’re redefining customer relationship management through innovation,
      technology, and trust.
    </p>
    
  </div>
</section>
    <!-- Main Services Section -->
    <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 mt-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <!-- <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Our Services</h2> -->
                <p class="mt-2 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Comprehensive CRM Solutions
                </p>
                <p class="mt-6 text-lg leading-8 !text-[#94A3B8]">
                    We offer a complete suite of CRM services to help you manage and grow your customer relationships.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <!-- Service 1 -->
                    <div class="flex flex-col !bg-[#1E293B] p-8 rounded-2xl hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-12 h-12 !bg-[#22D3EE] rounded-lg mb-6">
                            <svg class="w-6 h-6 !text-[#E5E7EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                        <dt class="text-xl font-semibold leading-7 !text-[#E5E7EB]">
                            Customer Management
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 !text-[#94A3B8]">
                            <p class="flex-auto">Centralized customer data management, interaction tracking, and history.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Contact Information Management
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Interaction History
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Customer Segmentation
                                </li>
                            </ul>
                        </dd>
                    </div>

                    <!-- Service 2 -->
                    <div class="flex flex-col !bg-[#1E293B] p-8 rounded-2xl hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-12 h-12 !bg-[#22D3EE] rounded-lg mb-6">
                            <svg class="w-6 h-6 !text-[#E5E7EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <dt class="text-xl font-semibold leading-7 !text-[#E5E7EB]">
                            Support System
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 !text-[#94A3B8]">
                            <p class="flex-auto">Efficient ticket management and customer support system.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Ticket Creation and Tracking
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Priority Management
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Resolution Tracking
                                </li>
                            </ul>
                        </dd>
                    </div>

                    <!-- Service 3 -->
                    <div class="flex flex-col !bg-[#1E293B] p-8 rounded-2xl hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-12 h-12 !bg-[#22D3EE] rounded-lg mb-6">
                            <svg class="w-6 h-6 !text-[#E5E7EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <dt class="text-xl font-semibold leading-7 !text-[#E5E7EB]">
                            Analytics & Reporting
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 !text-[#94A3B8]">
                            <p class="flex-auto">Comprehensive analytics and reporting tools.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Customer Insights
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Performance Metrics
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 !text-[#22D3EE] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Custom Reports
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- Additional Services Section -->
    <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Extended CRM Capabilities
                </h2>
                <p class="mt-4 text-lg !text-[#94A3B8] max-w-3xl mx-auto">
                    Beyond the basics, we offer specialized services to meet your unique business needs.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-3 lg:grid-cols-3">
                <!-- Extended Service 1 -->
                <div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
                    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Sales Automation</h3>
                    <p class="mt-2 !text-[#94A3B8] text-sm">
                        Automate your sales processes and boost productivity with intelligent workflows.
                    </p>
                </div>

                <!-- Extended Service 2 -->
                <div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
                    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Cloud Integration</h3>
                    <p class="mt-2 !text-[#94A3B8] text-sm">
                        Seamlessly connect with your existing tools and platforms.
                    </p>
                </div>

                <!-- Extended Service 3 -->
                <div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
                    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Security & Compliance</h3>
                    <p class="mt-2 !text-[#94A3B8] text-sm">
                        Enterprise-grade security with industry compliance standards.
                    </p>
                </div>

                <!-- Extended Service 4 -->
<div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
    </div>
    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Lead Management</h3>
    <p class="mt-2 !text-[#94A3B8] text-sm">
        Capture, track, and nurture leads through every stage of your sales pipeline with full visibility.
    </p>
</div>

<!-- Extended Service 5 -->
<div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </div>
    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Automated Follow-ups</h3>
    <p class="mt-2 !text-[#94A3B8] text-sm">
        Schedule and automate follow-up reminders and emails so no customer interaction ever falls through the cracks.
    </p>
</div>

<!-- Extended Service 6 -->
<div class="!bg-[#1E293B] p-6 rounded-xl shadow-sm border !border-[#334155] text-center">
    <div class="w-16 h-16 !bg-[rgba(34,211,238,0.15)] rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </div>
    <h3 class="text-lg font-semibold !text-[#E5E7EB]">Role-based Access Control</h3>
    <p class="mt-2 !text-[#94A3B8] text-sm">
        Assign permissions based on roles — admins, agents, and customers each get tailored access to the right data.
    </p>
</div>
                
            </div>
        </div>
    </section>

    <!-- Pricing Tiers Section -->
    <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Choose Your Plan
                </h2>
                <p class="mt-4 text-lg !text-[#94A3B8] max-w-3xl mx-auto">
                    Flexible pricing options designed to scale with your business.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Basic Plan -->
                <div class="!bg-[#1E293B] border !border-[#334155] rounded-2xl p-8 text-center">
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">Starter</h3>
                    <p class="mt-4 text-4xl font-bold !text-[#E5E7EB]">$29<span class="text-lg font-normal !text-[#94A3B8]">/month</span></p>
                    <ul class="mt-8 space-y-4">
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Up to 1000 contacts
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Basic support
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Standard analytics
                        </li>
                    </ul>
                    <button class="mt-8 w-full !bg-[#0F172A] !text-[#E5E7EB] py-3 px-4 rounded-lg font-semibold hover:bg-gray-200">
                        Get Started
                    </button>
                </div>

                <!-- Professional Plan -->
                 <div class="!bg-[#0F172A] border-2 !border-[#22D3EE] rounded-2xl p-8 text-center relative">
                    <span class="!bg-[#22D3EE] !text-[#E5E7EB] px-3 py-1 rounded-full text-sm font-semibold absolute -top-3 left-1/2 transform -translate-x-1/2">
                        Most Popular
                    </span>
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">Professional</h3>
                    <p class="mt-4 text-4xl font-bold !text-[#E5E7EB]">$79<span class="text-lg font-normal !text-[#94A3B8]">/month</span></p>
                    <ul class="mt-8 space-y-4">
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Up to 10,000 contacts
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Priority support
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Advanced analytics
                        </li>
                    </ul>
                    <button class="mt-8 w-full !bg-[#22D3EE] !text-[#E5E7EB] py-3 px-4 rounded-lg font-semibold hover:!bg-[#06B6D4]">
                        Get Started
                    </button>
                </div>

                <!-- Enterprise Plan -->
                <div class="!bg-[#1E293B] border !border-[#334155] rounded-2xl p-8 text-center">
                    <h3 class="text-xl font-semibold !text-[#E5E7EB]">Enterprise</h3>
                    <p class="mt-4 text-4xl font-bold !text-[#E5E7EB]">Custom</p>
                    <ul class="mt-8 space-y-4">
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Unlimited contacts
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            24/7 dedicated support
                        </li>
                        <li class="flex items-center !text-[#94A3B8]">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Custom analytics & reporting
                        </li>
                    </ul>
                    <button class="mt-8 w-full !bg-[#0F172A] !text-[#E5E7EB] py-3 px-4 rounded-lg font-semibold hover:bg-gray-200">
                        Contact Sales
                    </button>
                </div>
            </div>
        </div>
    </section>

    
@endsection