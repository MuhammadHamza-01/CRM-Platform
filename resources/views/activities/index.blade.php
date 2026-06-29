@extends('layouts.dashboard')
@section('title', 'Activities')
@section('header', 'Activities')

@section('content')
<div class="max-w-6xl mx-auto space-y-5">

    @if(session('success'))
    <div class="px-4 py-3 rounded-lg text-sm flex items-center gap-2" style="background-color:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.3); color:#22D3EE;">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-xl font-bold" style="color:#E5E7EB;">Daily Activities</h1>
        <a href="{{ route('activities.create') }}" class="px-4 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 transition-colors"
           style="background-color:#22D3EE; color:#0F172A;"
           onmouseover="this.style.backgroundColor='#06B6D4'" onmouseout="this.style.backgroundColor='#22D3EE'">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Log Activity
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        @php $stats=[
            ['label'=>'Total',     'count'=>$totalCount,    'color'=>'#E5E7EB'],
            ['label'=>'Meetings',  'count'=>$meetingCount,  'color'=>'#818CF8'],
            ['label'=>'Calls',     'count'=>$callCount,     'color'=>'#22D3EE'],
            ['label'=>'Notes',     'count'=>$noteCount,     'color'=>'#FBBF24'],
            ['label'=>'Follow-ups','count'=>$followUpCount, 'color'=>'#34D399'],
        ]; @endphp
        @foreach($stats as $s)
        <div class="rounded-xl p-4 text-center" style="background-color:#1E293B; border:1px solid #334155;">
            <div class="text-2xl font-bold" style="color:{{ $s['color'] }};">{{ $s['count'] }}</div>
            <div class="text-xs mt-1" style="color:#94A3B8;">{{ $s['label'] }}</div>
        </div>
        @endforeach
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-2">
        @foreach(['all'=>'All','meeting'=>'Meetings','call'=>'Calls','note'=>'Notes','follow_up'=>'Follow-ups'] as $k=>$l)
        <a href="{{ route('activities.index', array_merge(request()->query(), ['type'=>$k])) }}"
           class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors"
           style="{{ $type===$k ? 'background-color:rgba(34,211,238,0.15); color:#22D3EE; border:1px solid rgba(34,211,238,0.3);' : 'background-color:#1E293B; color:#94A3B8; border:1px solid #334155;' }}">
            {{ $l }}
        </a>
        @endforeach
        <div class="flex flex-wrap gap-2 sm:ml-auto">
            @foreach(['all'=>'All Status','planned'=>'Planned','completed'=>'Done','cancelled'=>'Cancelled'] as $k=>$l)
            <a href="{{ route('activities.index', array_merge(request()->query(), ['status'=>$k])) }}"
               class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors"
               style="{{ $status===$k ? 'background-color:rgba(129,140,248,0.15); color:#818CF8; border:1px solid rgba(129,140,248,0.3);' : 'background-color:#1E293B; color:#94A3B8; border:1px solid #334155;' }}">
                {{ $l }}
            </a>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        <!-- Activity list -->
        <div class="lg:col-span-2 space-y-3">
            @forelse($activities as $activity)
            <div class="rounded-xl p-4 transition-all" style="background-color:#1E293B; border:1px solid #334155;"
                 onmouseover="this.style.borderColor='#475569'" onmouseout="this.style.borderColor='#334155'">
                <div class="flex items-start gap-3">
                    <!-- Icon -->
                    <div class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center"
                         style="background-color:{{ $activity->typeBg() }}; border:1px solid {{ $activity->typeColor() }}30;">
                        @if($activity->type==='meeting')
                        <svg class="w-4 h-4" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        @elseif($activity->type==='call')
                        <svg class="w-4 h-4" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        @elseif($activity->type==='note')
                        <svg class="w-4 h-4" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        @else
                        <svg class="w-4 h-4" style="color:{{ $activity->typeColor() }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1">
                            <h3 class="text-sm font-semibold truncate" style="color:#E5E7EB;">{{ $activity->title }}</h3>
                            <span class="px-2 py-0.5 rounded-full text-xs flex-shrink-0" style="background-color:{{ $activity->typeBg() }}; color:{{ $activity->typeColor() }};">{{ $activity->typeLabel() }}</span>
                            <span class="px-2 py-0.5 rounded-full text-xs flex-shrink-0" style="background-color:{{ $activity->statusBg() }}; color:{{ $activity->statusColor() }};">{{ $activity->statusLabel() }}</span>
                        </div>
                        @if($activity->description)
                        <p class="text-xs mb-1 line-clamp-2" style="color:#94A3B8;">{{ $activity->description }}</p>
                        @endif
                        <div class="flex flex-wrap gap-3 text-xs" style="color:#94A3B8;">
                            <span>{{ $activity->activity_date->format('d M Y, H:i') }}</span>
                            @if($activity->follow_up_date)
                            <span style="color:{{ $activity->isFollowUpDue() ? '#F87171' : '#34D399' }};">
                                Follow-up: {{ $activity->follow_up_date->format('d M Y') }}
                                @if($activity->isFollowUpDue()) (Overdue)@endif
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <a href="{{ route('activities.show', $activity) }}" class="p-1.5 rounded-lg transition-colors" style="color:#94A3B8;" onmouseover="this.style.backgroundColor='#334155'; this.style.color='#E5E7EB'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                        <a href="{{ route('activities.edit', $activity) }}" class="p-1.5 rounded-lg transition-colors" style="color:#94A3B8;" onmouseover="this.style.backgroundColor='#334155'; this.style.color='#E5E7EB'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-1.5 rounded-lg transition-colors" style="color:#94A3B8;" onmouseover="this.style.backgroundColor='rgba(248,113,113,0.15)'; this.style.color='#F87171'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#94A3B8'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="rounded-xl py-14 text-center" style="background-color:#1E293B; border:1px solid #334155;">
                <svg class="w-12 h-12 mx-auto mb-3" style="color:#334155;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-sm mb-4" style="color:#94A3B8;">No activities found.</p>
                <a href="{{ route('activities.create') }}" class="px-4 py-2 rounded-lg text-sm font-semibold" style="background-color:#22D3EE; color:#0F172A;">Log Activity</a>
            </div>
            @endforelse

            @if($activities->hasPages())
            <div>{{ $activities->links() }}</div>
            @endif
        </div>

        <!-- Upcoming follow-ups -->
        <div>
            <div class="rounded-xl overflow-hidden" style="background-color:#1E293B; border:1px solid #334155;">
                <div class="px-5 py-4 flex items-center gap-2" style="border-bottom:1px solid #334155;">
                    <svg class="w-4 h-4" style="color:#34D399;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <h3 class="text-sm font-semibold" style="color:#E5E7EB;">Upcoming Follow-ups</h3>
                </div>
                <div class="divide-y" style="border-color:#334155;">
                    @forelse($upcomingFollowUps as $fu)
                    <div class="px-5 py-3">
                        <p class="text-sm font-medium truncate" style="color:#E5E7EB;">{{ $fu->title }}</p>
                        <p class="text-xs mt-0.5" style="color:#34D399;">{{ $fu->follow_up_date->format('d M Y, H:i') }}</p>
                        <span class="inline-block mt-1 px-2 py-0.5 rounded-full text-xs" style="background-color:{{ $fu->typeBg() }}; color:{{ $fu->typeColor() }};">{{ $fu->typeLabel() }}</span>
                    </div>
                    @empty
                    <div class="px-5 py-8 text-center text-xs" style="color:#94A3B8;">No upcoming follow-ups</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
