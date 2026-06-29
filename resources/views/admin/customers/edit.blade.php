@extends('layouts.dashboard')
@section('title', 'Edit Customer')
@section('header', 'Edit Customer')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4 flex items-center gap-3" style="border-bottom:1px solid #334155;">
            <a href="{{ route('admin.customers.show', $user) }}" class="text-sm transition-colors" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">← Back</a>
            <h3 class="font-semibold" style="color:#E5E7EB;">Edit Customer</h3>
        </div>
        <form action="{{ route('admin.customers.update', $user) }}" method="POST" class="px-5 py-5 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                @error('name')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'" onblur="this.style.borderColor='#334155'">
                @error('email')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end pt-2">
                <button type="submit"
                    class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors duration-150"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
                    Update Customer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
