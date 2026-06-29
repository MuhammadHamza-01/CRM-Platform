@extends('layouts.dashboard')

@section('title', 'Edit Activity')
@section('header', 'Edit Activity')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">

        <div class="px-6 py-4 flex items-center gap-3" style="border-bottom:1px solid #334155;">
            <a href="{{ route('activities.index') }}"
               class="p-1.5 rounded-lg transition-colors duration-150"
               style="color:#94A3B8;"
               onmouseover="this.style.backgroundColor='#334155'; this.style.color='#E5E7EB'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h3 class="font-semibold" style="color:#E5E7EB;">Edit Activity</h3>
        </div>

        <form action="{{ route('activities.update', $activity) }}" method="POST" class="px-6 py-6 space-y-5">
            @csrf @method('PUT')

            {{-- Type --}}
            <div>
                <label class="block text-sm font-medium mb-3" style="color:#E5E7EB;">Activity Type</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @php
                    $types = [
                        'meeting'   => ['label'=>'Meeting',   'color'=>'#818CF8', 'bg'=>'rgba(129,140,248,0.15)', 'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                        'call'      => ['label'=>'Call',      'color'=>'#22D3EE', 'bg'=>'rgba(34,211,238,0.15)',  'icon'=>'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
                        'note'      => ['label'=>'Note',      'color'=>'#FBBF24', 'bg'=>'rgba(251,191,36,0.15)',  'icon'=>'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                        'follow_up' => ['label'=>'Follow-up', 'color'=>'#34D399', 'bg'=>'rgba(52,211,153,0.15)',  'icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ];
                    $selectedType = old('type', $activity->type);
                    @endphp
                    @foreach($types as $key => $t)
                    <label class="cursor-pointer">
                        <input type="radio" name="type" value="{{ $key }}" class="sr-only"
                               {{ $selectedType === $key ? 'checked' : '' }}
                               onchange="updateTypeCards()">
                        <div id="type-card-{{ $key }}"
                             class="rounded-xl p-3 text-center transition-all duration-150 border-2"
                             style="{{ $selectedType === $key
                                 ? 'background-color:'.$t['bg'].'; border-color:'.$t['color'].';'
                                 : 'background-color:#0F172A; border-color:#334155;' }}">
                            <svg class="w-6 h-6 mx-auto mb-1" style="color:{{ $t['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t['icon'] }}"/>
                            </svg>
                            <span class="text-xs font-medium" style="color:{{ $t['color'] }};">{{ $t['label'] }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Title</label>
                <input type="text" name="title" required value="{{ old('title', $activity->title) }}"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                @error('title')
                    <p class="mt-1 text-xs" style="color:#F87171;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">
                    Description / Notes
                    <span class="ml-1 text-xs font-normal" style="color:#94A3B8;">(optional)</span>
                </label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-2.5 rounded-lg text-sm resize-none"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                    onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">{{ old('description', $activity->description) }}</textarea>
            </div>

            {{-- Date & Status --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Activity Date & Time</label>
                    <input type="datetime-local" name="activity_date"
                        value="{{ old('activity_date', $activity->activity_date->format('Y-m-d\TH:i')) }}"
                        class="w-full px-4 py-2.5 rounded-lg text-sm"
                        style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none; color-scheme:dark;"
                        onfocus="this.style.borderColor='#22D3EE'; this.style.boxShadow='0 0 0 2px rgba(34,211,238,0.15)'"
                        onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">Status</label>
                    <select name="status"
                        class="w-full px-4 py-2.5 rounded-lg text-sm"
                        style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none;"
                        onfocus="this.style.borderColor='#818CF8'"
                        onblur="this.style.borderColor='#334155'">
                        @foreach(['planned'=>'Planned','completed'=>'Completed','cancelled'=>'Cancelled'] as $val => $label)
                        <option value="{{ $val }}" {{ old('status', $activity->status) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Follow-up date --}}
            <div>
                <label class="block text-sm font-medium mb-2" style="color:#E5E7EB;">
                    Follow-up Date
                    <span class="ml-1 text-xs font-normal" style="color:#94A3B8;">(optional)</span>
                </label>
                <input type="datetime-local" name="follow_up_date"
                    value="{{ old('follow_up_date', $activity->follow_up_date?->format('Y-m-d\TH:i')) }}"
                    class="w-full px-4 py-2.5 rounded-lg text-sm"
                    style="background-color:#0F172A; border:1px solid #334155; color:#E5E7EB; outline:none; color-scheme:dark;"
                    onfocus="this.style.borderColor='#34D399'; this.style.boxShadow='0 0 0 2px rgba(52,211,153,0.15)'"
                    onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'">
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors duration-150"
                    style="background-color:#22D3EE; color:#0F172A;"
                    onmouseover="this.style.backgroundColor='#06B6D4'"
                    onmouseout="this.style.backgroundColor='#22D3EE'">
                    Save Changes
                </button>
                <a href="{{ route('activities.index') }}"
                   class="px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors duration-150"
                   style="background-color:#334155; color:#E5E7EB;"
                   onmouseover="this.style.backgroundColor='#475569'"
                   onmouseout="this.style.backgroundColor='#334155'">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
const typeColors = {
    meeting:   { color: '#818CF8', bg: 'rgba(129,140,248,0.15)' },
    call:      { color: '#22D3EE', bg: 'rgba(34,211,238,0.15)'  },
    note:      { color: '#FBBF24', bg: 'rgba(251,191,36,0.15)'  },
    follow_up: { color: '#34D399', bg: 'rgba(52,211,153,0.15)'  },
};
function updateTypeCards() {
    const selected = document.querySelector('input[name="type"]:checked')?.value;
    Object.keys(typeColors).forEach(key => {
        const card = document.getElementById('type-card-' + key);
        if (!card) return;
        card.style.backgroundColor = key === selected ? typeColors[key].bg    : '#0F172A';
        card.style.borderColor     = key === selected ? typeColors[key].color : '#334155';
    });
}
document.querySelectorAll('input[name="type"]').forEach(r => r.addEventListener('change', updateTypeCards));
</script>
@endsection
