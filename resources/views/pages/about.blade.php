@extends('layouts.app')

@section('content')


<section class="hero-section relative flex items-center justify-center bg-blue-50 ...">
</section>




    <!-- Values Section -->
    <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Our Values</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    What Drives Us Forward
                </p>
                <p class="mt-6 text-lg leading-8 !text-[#94A3B8] max-w-3xl mx-auto">
                    These core principles guide every decision we make and every feature we build.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Value 1 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 !bg-[rgba(34,211,238,0.15)] rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Customer Success First</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        We measure our success by our customers' success. Your growth and satisfaction are our top priorities.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 !bg-[rgba(34,211,238,0.15)] rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Innovation & Excellence</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        We continuously push boundaries to deliver cutting-edge solutions that set new standards in the CRM industry.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="!bg-[#1E293B] p-8 rounded-2xl shadow-sm border !border-[#334155]">
                    <div class="w-12 h-12 !bg-[rgba(34,211,238,0.15)] rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 !text-[#22D3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Collaboration & Trust</h3>
                    <p class="mt-4 !text-[#94A3B8]">
                        We build relationships based on transparency, respect, and mutual trust with our customers and team members.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <!-- <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Our Team</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Meet The Experts
                </p>
                <p class="mt-6 text-lg leading-8 !text-[#94A3B8] max-w-3xl mx-auto">
                    Behind ElevatedCRM is a diverse team of passionate professionals dedicated to transforming customer relationship management.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="text-center">
                    <div class="mx-auto h-[100px] w-[100px] rounded-full overflow-hidden">
                        <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1613419441661-6a5af1751d30?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8eW91bmclMjBtYW58ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=600" alt="Sarah Johnson">
                    </div>
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Sarah Johnson</h3>
                    <p class="!text-[#22D3EE]">CEO & Founder</p>
                    <p class="mt-4 !text-[#94A3B8]">
                        With over 15 years in CRM technology, Sarah founded ElevatedCRM to solve the customer management challenges she witnessed across industries.
                    </p>
                </div>

                <div class="text-center">
                    <img class="mx-auto h-48 w-48 rounded-full object-cover" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Michael Chen">
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Michael Chen</h3>
                    <p class="!text-[#22D3EE]">CTO</p>
                    <p class="mt-4 !text-[#94A3B8]">
                        Michael leads our technology vision with expertise in scalable architecture and innovative software solutions.
                    </p>
                </div>

                <div class="text-center">
                    <img class="mx-auto h-48 w-48 rounded-full object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Emily Rodriguez">
                    <h3 class="mt-6 text-lg font-semibold !text-[#E5E7EB]">Emily Rodriguez</h3>
                    <p class="!text-[#22D3EE]">Head of Customer Success</p>
                    <p class="mt-4 !text-[#94A3B8]">
                        Emily ensures every customer achieves their goals with ElevatedCRM through dedicated support and strategic guidance.
                    </p>
                </div>
            </div>
        </div>
    </section> -->

   

    <!-- Features Section -->
    <section class="py-16 !bg-[#1E293B] sm:py-20 lg:py-24 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold leading-7 !text-[#22D3EE]">Why Choose Us</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">
                    Your Trusted CRM Partner
                </p>
                <p class="mt-6 text-lg leading-8 !text-[#94A3B8] max-w-3xl mx-auto">
                    We are dedicated to helping businesses build stronger relationships with their customers through our innovative CRM solution.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 !text-[#E5E7EB]">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg !bg-[#22D3EE]">
                                <svg class="h-6 w-6 !text-[#E5E7EB]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </div>
                            Global Presence
                        </dt>
                        <dd class="mt-2 text-base leading-7 !text-[#94A3B8]">
                            Serving businesses worldwide with reliable CRM solutions that scale with your needs.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 !text-[#E5E7EB]">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg !bg-[#22D3EE]">
                                <svg class="h-6 w-6 !text-[#E5E7EB]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>
                            </div>
                            Expert Team
                        </dt>
                        <dd class="mt-2 text-base leading-7 !text-[#94A3B8]">
                            Our team of CRM experts is dedicated to your success and available 24/7 for support.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 !text-[#E5E7EB]">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg !bg-[#22D3EE]">
                                <svg class="h-6 w-6 !text-[#E5E7EB]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            Innovation Focus
                        </dt>
                        <dd class="mt-2 text-base leading-7 !text-[#94A3B8]">
                            Constantly evolving our platform with cutting-edge features and the latest technology.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 !text-[#E5E7EB]">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg !bg-[#22D3EE]">
                                <svg class="h-6 w-6 !text-[#E5E7EB]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            Security First
                        </dt>
                        <dd class="mt-2 text-base leading-7 !text-[#94A3B8]">
                            Enterprise-grade security measures to protect your valuable customer data and business information.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

   
@endsection