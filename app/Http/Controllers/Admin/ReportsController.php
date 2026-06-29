<?php

namespace App\Http\Controllers\Admin;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportsController extends BaseAdminController
{
    public function index(Request $request): View
    {
        $period = $request->get('period', '30'); // days

        $from = now()->subDays((int) $period);

        // Tickets created in period
        $newTickets = SupportTicket::where('created_at', '>=', $from)->count();

        // Tickets resolved in period
        $resolvedTickets = SupportTicket::where('status', 'closed')
            ->where('updated_at', '>=', $from)->count();

        // Average resolution time (days) for closed tickets
        $avgResolutionDays = SupportTicket::where('status', 'closed')
            ->whereNotNull('replied_at')
            ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, replied_at)) / 24 as avg_days')
            ->value('avg_days');

        // New customers in period
        $newCustomers = User::where('role', 'customer')
            ->where('created_at', '>=', $from)->count();

        // Tickets by priority
        $byPriority = SupportTicket::selectRaw('priority, COUNT(*) as count')
            ->groupBy('priority')
            ->pluck('count', 'priority');

        // Tickets by category
        $byCategory = SupportTicket::selectRaw('category, COUNT(*) as count')
            ->whereNotNull('category')
            ->groupBy('category')
            ->orderByDesc('count')
            ->pluck('count', 'category');

        // Top customers by ticket count
        $topCustomers = User::where('role', 'customer')
            ->withCount('tickets')
            ->orderByDesc('tickets_count')
            ->take(10)
            ->get();

        // Daily ticket volume (last 14 days)
        $dailyVolume = collect(range(13, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return [
                'date'  => $date->format('M j'),
                'count' => SupportTicket::whereDate('created_at', $date->toDateString())->count(),
            ];
        });

        return view('admin.reports.index', compact(
            'period', 'newTickets', 'resolvedTickets',
            'avgResolutionDays', 'newCustomers',
            'byPriority', 'byCategory', 'topCustomers', 'dailyVolume'
        ));
    }
}
