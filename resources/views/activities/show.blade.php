@extends('layouts.dashboard')

@section('title', 'Activity Details')
@section('header', 'Activity Details')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="rounded-xl" style="background-color:#1E293B; border:1px solid #334155;">

        {{-- Header --}}
        <div class="px-6 py-4 flex items-center justify-between" style="border-bottom:1px solid #334155;">
            <div class="flex items-center gap-3">
                <a href="{{ route('activities.index') }}"
                   class="p-1.5 rounded-lg transition-colors duration-150"
                   style="color:#94A3B8;"
                   onmouseover="this.style.backgroundColor='#334155'; this.style.color='#E5E7EB'"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h3 class="font-semibold" style="color:#E5E7EB;">Activity Details</h3>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('activities.edit', $activity) }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150"
                   style="background-color:#334155; color:#E5E7EB;"
                   onmouseover="this.style.backgroundColor='#475569'"
                   onmouseout="this.style.backgroundColor='#334155'">Edit</a>
                <form action="{{ route('activities.destroy', $activity) }}" method="POST"
                      onsubmit="return confirm('Delete this activity?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150"
                        style="background-color:rgba(248,113,113,0.15); color:#F87171; border:1px solid rgba(248,113,113,0.3);"
                        onmouseover="this.style.backgroundColor='rgba(248,113,113,0.25)'"
                        onmouseout="this.style.backgroundColor='rgba(248,113,113,0.15)'">Delete</button>
                </form>
            </div>
        </div>

        {{-- Body --}}
        <div class="px-6 py-6 space-y-6">

            {{-- Type + Status badges --}}
            <div class="flex items-center gap-3 flex-wrap">
                <div class="flex items-center gap-2 px-3 py-2 rounded-xl"
                     style="background-color:{{ $activity->typeBg() }}; border:1px solid {{ $activity->typeColor() }}40;">
                    @if($activity->type === 'meeting')
                    <svg class="w-5 h-5" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    @elseif($activity->type === 'call')
                    <svg class="w-5 h-5" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    @elseif($activity->type === 'note')
                    <svg class="w-5 h-5" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    @else
                    <svg class="w-5 h-5" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    @endif
                    <span class="text-sm font-semibold" style="color:{{ $activity->typeColor() }};">{{ $activity->typeLabel() }}</span>
                </div>

                <span class="px-3 py-2 rounded-xl text-sm font-semibold"
                      style="background-color:{{ $activity->statusBg() }}; color:{{ $activity->statusColor() }}; border:1px solid {{ $activity->statusColor() }}40;">
                    {{ $activity->statusLabel() }}
                </span>
            </div>

            {{-- Title --}}
            <div>
                <p class="text-xs uppercase tracking-wider mb-1" style="color:#94A3B8;">Title</p>
                <h2 class="text-xl font-bold" style="color:#E5E7EB;">{{ $activity->title }}</h2>
            </div>

            {{-- Description --}}
            @if($activity->description)
            <div>
                <p class="text-xs uppercase tracking-wider mb-2" style="color:#94A3B8;">Notes / Description</p>
                <div class="px-4 py-3 rounded-lg text-sm leading-relaxed whitespace-pre-wrap"
                     style="background-color:#0F172A; color:#E5E7EB; border:1px solid #334155;">{{ $activity->description }}</div>
            </div>
            @endif

            {{-- Date info --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="px-4 py-3 rounded-lg" style="background-color:#0F172A; border:1px solid #334155;">
                    <p class="text-xs uppercase tracking-wider mb-1" style="color:#94A3B8;">Activity Date</p>
                    <p class="text-sm font-semibold" style="color:#E5E7EB;">{{ $activity->activity_date->format('d M Y') }}</p>
                    <p class="text-xs mt-0.5" style="color:#94A3B8;">{{ $activity->activity_date->format('H:i') }}</p>
                </div>

                <div class="px-4 py-3 rounded-lg" style="background-color:#0F172A; border:1px solid {{ $activity->follow_up_date ? ($activity->isFollowUpDue() ? '#F87171' : '#34D399') : '#334155' }};">
                    <p class="text-xs uppercase tracking-wider mb-1" style="color:#94A3B8;">Follow-up Date</p>
                    @if($activity->follow_up_date)
                        <p class="text-sm font-semibold" style="color:{{ $activity->isFollowUpDue() ? '#F87171' : '#34D399' }};">
                            {{ $activity->follow_up_date->format('d M Y') }}
                        </p>
                        <p class="text-xs mt-0.5" style="color:#94A3B8;">
                            {{ $activity->follow_up_date->format('H:i') }}
                            @if($activity->isFollowUpDue()) · <span style="color:#F87171;">Overdue</span> @endif
                        </p>
                    @else
                        <p class="text-sm" style="color:#475569;">No follow-up set</p>
                    @endif
                </div>
            </div>

            {{-- Meta --}}
            <div class="pt-2 text-xs" style="color:#475569; border-top:1px solid #334155;">
                Logged {{ $activity->created_at->diffForHumans() }}
                @if($activity->updated_at != $activity->created_at)
                    · Updated {{ $activity->updated_at->diffForHumans() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
