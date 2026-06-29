@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);">
    <div class="max-w-xl w-full space-y-8">
        <!-- Header Section -->
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-28 w-auto drop-shadow-lg">
            </div>
            <h2 class="text-3xl font-bold" style="color:#E5E7EB;">
                Welcome Back
            </h2>
            <p class="mt-2 text-sm" style="color:#94A3B8;">
                Sign in to your ElevatedCRM account
            </p>
        </div>

        <!-- Login Form -->
        <div class="p-8 rounded-2xl" style="background-color:#1E293B; border:1px solid #334155; box-shadow:0 8px 32px rgba(0,0,0,0.5);">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-2" style="color:#E5E7EB;">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5" style="color:#94A3B8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}"
                            class="block w-full pl-10 pr-3 py-3 rounded-lg transition-colors duration-200 @error('email') border-red-500 @enderror"
                            style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                            onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.2)'"
                            onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'"
                            placeholder="Enter your email">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm flex items-center" style="color:#F87171;">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-2" style="color:#E5E7EB;">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5" style="color:#94A3B8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="block w-full pl-10 pr-3 py-3 rounded-lg transition-colors duration-200 @error('password') border-red-500 @enderror"
                            style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                            onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.2)'"
                            onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'"
                            placeholder="Enter your password">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm flex items-center" style="color:#F87171;">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 rounded"
                            style="accent-color:#22D3EE;">
                        <label for="remember" class="ml-2 block text-sm" style="color:#94A3B8;">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium transition-colors duration-200" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">
                                Forgot password?
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center items-center py-3 px-4 text-sm font-semibold rounded-lg transition-all duration-200 transform hover:scale-105"
                        style="background-color:#22D3EE; color:#0F172A;"
                        onmouseover="this.style.backgroundColor='#06B6D4'"
                        onmouseout="this.style.backgroundColor='#22D3EE'">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                        </span>
                        Sign in to your account
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full" style="border-top:1px solid #334155;"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 text-sm" style="background-color:#1E293B; color:#94A3B8;">
                            New to ElevatedCRM?
                        </span>
                    </div>
                </div>
            </div>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center justify-center w-full py-3 px-4 rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105"
                   style="border:1px solid #334155; color:#E5E7EB; background-color:transparent;"
                   onmouseover="this.style.backgroundColor='#273549'; this.style.borderColor='#475569'"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='#334155'">
                    <svg class="w-5 h-5 mr-2" style="color:#818CF8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Create new account
                </a>
            </div>
        </div>

        <!-- Footer Links -->
        <div class="text-center">
            <p class="text-xs" style="color:#94A3B8;">
                By continuing, you agree to our
                <a href="#" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">Terms of Service</a>
                and
                <a href="#" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>
@endsection
