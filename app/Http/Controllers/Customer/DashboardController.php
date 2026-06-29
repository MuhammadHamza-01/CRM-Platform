<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $tickets = SupportTicket::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $totalTickets  = SupportTicket::where('user_id', $user->id)->count();
        $openTickets   = SupportTicket::where('user_id', $user->id)->where('status', 'open')->count();
        $closedTickets = SupportTicket::where('user_id', $user->id)->where('status', 'closed')->count();
        $pendingReply  = SupportTicket::where('user_id', $user->id)
            ->where('status', 'in_progress')->count();

        return view('customer.dashboard', compact(
            'tickets', 'totalTickets', 'openTickets', 'closedTickets', 'pendingReply'
        ));
    }
}
