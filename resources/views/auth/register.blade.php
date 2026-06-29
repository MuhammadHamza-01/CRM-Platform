@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);">
    <div class="w-full max-w-md space-y-8">
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('logo.png') }}" alt="ElevatedCRM" class="h-28 w-auto drop-shadow-lg">
            </div>
            <h2 class="text-3xl font-bold" style="color:#E5E7EB;">Join ElevatedCRM</h2>
            <p class="mt-2 text-sm" style="color:#94A3B8;">Create your account to get started</p>
        </div>

        <div class="p-6 sm:p-8 rounded-2xl" style="background-color:#1E293B; border:1px solid #334155; box-shadow:0 8px 32px rgba(0,0,0,0.5);">
            <form class="space-y-5" action="{{ route('register') }}" method="POST">
                @csrf
                @php
                $inputStyle = 'w-full pl-10 pr-3 py-3 rounded-lg text-sm outline-none transition-all';
                $inputInline = 'background-color:#0F172A; border:1px solid #334155; color:#E5E7EB;';
                @endphp

                @foreach([
                    ['name','name','Full Name','text','M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['email','email','Email Address','email','M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207'],
                    ['password','password','Password','password','M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                    ['password_confirmation','confirm','Confirm Password','password','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ] as [$field, $id, $label, $type, $icon])
                <div>
                    <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">{{ $label }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4" style="color:#94A3B8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                        </div>
                        <input id="{{ $id }}" name="{{ $field }}" type="{{ $type }}" {{ $type!=='password'?'autocomplete='.$field:'' }} {{ $id!=='confirm'?'required':'' }}
                            value="{{ $field==='name' || $field==='email' ? old($field) : '' }}"
                            class="{{ $inputStyle }}" style="{{ $inputInline }}"
                            onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                            onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'"
                            placeholder="{{ $label }}">
                    </div>
                    @error($field)
                    <p class="mt-1 text-xs flex items-center gap-1" style="color:#F87171;">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @endforeach

                <div class="flex items-start gap-2">
                    <input id="terms" name="terms" type="checkbox" required class="mt-0.5 h-4 w-4 rounded" style="accent-color:#22D3EE;">
                    <label for="terms" class="text-sm" style="color:#94A3B8;">
                        I agree to the <a href="#" style="color:#22D3EE;">Terms of Service</a> and <a href="#" style="color:#22D3EE;">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 px-4 rounded-lg text-sm font-semibold transition-colors"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
                    Create Account
                </button>

                <div class="relative mt-4">
                    <div class="absolute inset-0 flex items-center"><div class="w-full" style="border-top:1px solid #334155;"></div></div>
                    <div class="relative flex justify-center text-xs"><span class="px-2" style="background-color:#1E293B; color:#94A3B8;">Already have an account?</span></div>
                </div>

                <a href="{{ route('login') }}" class="w-full flex items-center justify-center py-3 px-4 rounded-lg text-sm font-medium transition-colors"
                   style="border:1px solid #334155; color:#E5E7EB;"
                   onmouseover="this.style.backgroundColor='#273549'" onmouseout="this.style.backgroundColor='transparent'">
                    Sign in instead
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
