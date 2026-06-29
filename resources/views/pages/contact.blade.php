@extends('layouts.app')

@section('content')
<section class="hero-section relative flex items-center justify-center !bg-[#0F172A] text-center !text-[#E5E7EB]" style="min-height: 220px;">
  <!-- Content -->
  <div class="relative z-10 px-4 sm:px-6 max-w-2xl mx-auto">
    <h1 class="text-3xl sm:text-4xl font-extrabold mb-3 !text-[#94A3B8] leading-tight py-auto">
      Contact Elevated CRM Team
    </h1>
    <p class="text-sm sm:text-base mb-5 !text-[#94A3B8]">
      We're redefining customer relationship management through innovation,
      technology, and trust.
    </p>
  </div>
</section>

    <div class="!bg-[#1E293B] py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight !text-[#E5E7EB] sm:text-4xl">Contact Us</h2>
                <p class="mt-2 text-lg leading-8 !text-[#94A3B8]">
                    Have questions? We'd love to hear from you.
                </p>
            </div>
            <div class="mx-auto mt-16 grid max-w-4xl grid-cols-1 gap-8 sm:mt-20 lg:grid-cols-2">
                <!-- Contact Form -->
                <div class="!bg-[#1E293B] p-8 shadow-sm ring-1 ring-gray-900/5 rounded-lg">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 !text-[#E5E7EB]">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 !bg-[#0F172A] !text-[#E5E7EB] shadow-sm ring-1 ring-inset !ring-[#334155] placeholder:!text-[#94A3B8] focus:ring-2 focus:ring-inset focus:!ring-[#22D3EE] sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 !text-[#E5E7EB]">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 !bg-[#0F172A] !text-[#E5E7EB] shadow-sm ring-1 ring-inset !ring-[#334155] placeholder:!text-[#94A3B8] focus:ring-2 focus:ring-inset focus:!ring-[#22D3EE] sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium leading-6 !text-[#E5E7EB]">Message</label>
                            <div class="mt-2">
                                <textarea id="message" name="message" rows="4" required class="block w-full rounded-md border-0 py-1.5 !bg-[#0F172A] !text-[#E5E7EB] shadow-sm ring-1 ring-inset !ring-[#334155] placeholder:!text-[#94A3B8] focus:ring-2 focus:ring-inset focus:!ring-[#22D3EE] sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md !bg-[#22D3EE] px-3 py-1.5 text-sm font-semibold leading-6 !text-[#E5E7EB] shadow-sm hover:!bg-[#06B6D4] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="!bg-[#1E293B] p-8 shadow-sm ring-1 ring-gray-900/5 rounded-lg">
                    <h3 class="text-base font-semibold leading-7 !text-[#E5E7EB]">Get in touch</h3>
                    <dl class="mt-6 space-y-4 text-base leading-7 !text-[#94A3B8]">
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Address</span>
                                <svg class="h-7 w-6 !text-[#94A3B8]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m16.5-18v18m-7.5-18v18M12 6.75h.008v.008H12V6.75z" />
                                </svg>
                            </dt>
                            <dd>
                                123 CRM Street<br>
                                Suite 100<br>
                                New York, NY 10001
                            </dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Telephone</span>
                                <svg class="h-7 w-6 !text-[#94A3B8]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </dt>
                            <dd>
                                <a class="hover:!text-[#E5E7EB]" href="tel:+1 (555) 234-5678">+1 (555) 234-5678</a>
                            </dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Email</span>
                                <svg class="h-7 w-6 !text-[#94A3B8]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </dt>
                            <dd>
                                <a class="hover:!text-[#E5E7EB]" href="mailto:contact@example.com">contact@example.com</a>
                            </dd>
                        </div>
                    </dl>
                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-7 !text-[#E5E7EB]">Follow us</h3>
                        <div class="mt-4 flex gap-x-6">
                            <a href="#" class="!text-[#94A3B8] hover:!text-[#22D3EE] transition-colors duration-200">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="!text-[#94A3B8] hover:!text-[#22D3EE] transition-colors duration-200">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="#" class="!text-[#94A3B8] hover:!text-[#22D3EE] transition-colors duration-200">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection