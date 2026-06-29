@extends('layouts.dashboard')
@section('title', 'My Profile')
@section('header', 'My Profile')

@section('content')
<div class="max-w-xl mx-auto">
    @if(session('status'))
    <div class="mb-4 px-4 py-3 rounded-lg text-sm flex items-center gap-2" style="background-color:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.3); color:#22D3EE;">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('status') }}
    </div>
    @endif

    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4" style="border-bottom:1px solid #334155;">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0"
                     style="background-color:rgba(34,211,238,0.15); color:#22D3EE; border:1px solid rgba(34,211,238,0.3);">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="font-semibold" style="color:#E5E7EB;">{{ auth()->user()->name }}</h2>
                    <p class="text-xs" style="color:#94A3B8;">{{ ucfirst(auth()->user()->role) }}</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="px-5 py-5 space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Full Name</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                @error('name')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Email Address</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                @error('email')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>

            <div style="border-top:1px solid #334155; padding-top:1.25rem;">
                <h3 class="text-sm font-medium mb-4" style="color:#94A3B8;">Change Password <span class="text-xs font-normal">(leave blank to keep current)</span></h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">New Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2.5 rounded-lg text-sm"
                            style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                            onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                            onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                        @error('password')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-2.5 rounded-lg text-sm"
                            style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                            onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                            onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-1">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
