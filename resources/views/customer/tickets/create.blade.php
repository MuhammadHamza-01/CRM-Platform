@extends('layouts.dashboard')
@section('title', 'New Support Ticket')
@section('header', 'New Support Ticket')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">
        <div class="px-5 py-4 flex items-center gap-3" style="border-bottom:1px solid #334155;">
            <a href="{{ route('customer.tickets') }}" class="text-sm" style="color:#22D3EE;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#22D3EE'">← Back</a>
            <h2 class="font-semibold" style="color:#E5E7EB;">Create Support Ticket</h2>
        </div>
        <form action="{{ route('customer.tickets.store') }}" method="POST" class="px-5 py-5 space-y-5">
            @csrf

            {{-- Title --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Brief description of your issue"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                @error('title')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>

            

            {{-- Category --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Category</label>
                <select name="category"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;">
                    <option value="">Select category (optional)</option>
                    @foreach($categories as $value => $label)
                        <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Description</label>
                <textarea name="description" rows="5" required placeholder="Detailed description of your issue (at least 20 characters)"
                    class="w-full px-4 py-2.5 rounded-lg text-sm resize-none"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
                    Submit Ticket
                </button>
            </div>
        </form>
    </div>
</div>
@endsection