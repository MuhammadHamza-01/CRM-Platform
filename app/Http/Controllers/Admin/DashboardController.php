<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SupportTicket;
use Illuminate\View\View;

class DashboardController extends BaseAdminController
{
    public function index(): View
    {
        $totalCustomers  = User::where('role', 'customer')->count();
        $activeThisMonth = User::where('role', 'customer')
            ->whereMonth('created_at', now()->month)
            ->count();
        $totalTickets = SupportTicket::count();
        $openTickets  = SupportTicket::where('status', 'open')->count();
        $urgentTickets = SupportTicket::where('priority', 'urgent')
            ->where('status', '!=', 'closed')->count();
        $resolvedThisMonth = SupportTicket::where('status', 'closed')
            ->whereMonth('updated_at', now()->month)->count();

        $recentCustomers = User::where('role', 'customer')
            ->latest()->take(5)->get();

        $recentTickets = SupportTicket::with('user')
            ->latest()->take(5)->get();

        // Tickets by status for chart
        $ticketsByStatus = [
            'open'        => SupportTicket::where('status', 'open')->count(),
            'in_progress' => SupportTicket::where('status', 'in_progress')->count(),
            'closed'      => SupportTicket::where('status', 'closed')->count(),
        ];

        // Monthly ticket trend (last 6 months)
        $monthlyTrend = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = now()->subMonths($monthsAgo);
            return [
                'month' => $date->format('M'),
                'count' => SupportTicket::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
            ];
        });

        return view('admin.dashboard', compact(
            'totalCustomers', 'activeThisMonth',
            'totalTickets', 'openTickets', 'urgentTickets',
            'resolvedThisMonth', 'recentCustomers', 'recentTickets',
            'ticketsByStatus', 'monthlyTrend'
        ));
    }
}
