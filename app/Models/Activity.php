<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'activity_date',
        'follow_up_date',
        'status',
    ];

    protected $casts = [
        'activity_date'  => 'datetime',
        'follow_up_date' => 'datetime',
    ];

    // ── Type labels & icons ───────────────────────────────────────────────────

    public static array $types = [
        'meeting'   => 'Meeting',
        'call'      => 'Call',
        'note'      => 'Note',
        'follow_up' => 'Follow-up',
    ];

    public static array $statuses = [
        'planned'   => 'Planned',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ];

    public function typeLabel(): string
    {
        return self::$types[$this->type] ?? ucfirst($this->type);
    }

    public function statusLabel(): string
    {
        return self::$statuses[$this->status] ?? ucfirst($this->status);
    }

    public function typeColor(): string
    {
        return match($this->type) {
            'meeting'   => '#818CF8',   // purple
            'call'      => '#22D3EE',   // cyan
            'note'      => '#FBBF24',   // amber
            'follow_up' => '#34D399',   // emerald
            default     => '#94A3B8',
        };
    }

    public function typeBg(): string
    {
        return match($this->type) {
            'meeting'   => 'rgba(129,140,248,0.15)',
            'call'      => 'rgba(34,211,238,0.15)',
            'note'      => 'rgba(251,191,36,0.15)',
            'follow_up' => 'rgba(52,211,153,0.15)',
            default     => 'rgba(148,163,184,0.15)',
        };
    }

    public function statusColor(): string
    {
        return match($this->status) {
            'planned'   => '#818CF8',
            'completed' => '#22D3EE',
            'cancelled' => '#F87171',
            default     => '#94A3B8',
        };
    }

    public function statusBg(): string
    {
        return match($this->status) {
            'planned'   => 'rgba(129,140,248,0.1)',
            'completed' => 'rgba(34,211,238,0.1)',
            'cancelled' => 'rgba(248,113,113,0.1)',
            default     => 'rgba(148,163,184,0.1)',
        };
    }

    public function isFollowUpDue(): bool
    {
        return $this->follow_up_date
            && $this->follow_up_date->isPast()
            && $this->status !== 'completed';
    }

    // ── Relations ─────────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeWithStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeUpcomingFollowUps($query)
    {
        return $query->whereNotNull('follow_up_date')
                     ->where('follow_up_date', '>=', now())
                     ->where('status', '!=', 'completed')
                     ->orderBy('follow_up_date');
    }
}
