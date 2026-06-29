<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(Request $request): View
    {
        $query = SupportTicket::with('user')->latest();

        // Search by title, customer name, or email
        if ($search = $request->get('search')) {
            $query->search($search);
        }

        // Filter by status
        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        // Filter by priority
        if ($priority = $request->get('priority')) {
            $query->where('priority', $priority);
        }

        $tickets = $query->paginate(15)->withQueryString();

        $stats = [
            'total'       => SupportTicket::count(),
            'open'        => SupportTicket::where('status', 'open')->count(),
            'in_progress' => SupportTicket::where('status', 'in_progress')->count(),
            'closed'      => SupportTicket::where('status', 'closed')->count(),
            'urgent'      => SupportTicket::where('priority', 'urgent')->where('status', '!=', 'closed')->count(),
        ];

        return view('admin.tickets.index', compact('tickets', 'stats'));
    }

    public function show(SupportTicket $ticket): View
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, SupportTicket $ticket): RedirectResponse
    {
        $validated = $request->validate([
            'status'      => ['required', 'in:open,in_progress,closed'],
            'priority'    => ['required', 'in:low,medium,high,urgent'],
            'admin_reply' => ['nullable', 'string', 'max:5000'],
        ]);

        // Track when admin first replied
        if (!empty($validated['admin_reply']) && is_null($ticket->admin_reply)) {
            $validated['replied_at'] = now();
        }

        $ticket->update($validated);

        return redirect()->route('admin.tickets.show', $ticket)
            ->with('success', 'Ticket updated successfully.');
    }

    public function destroy(SupportTicket $ticket): RedirectResponse
    {
        $ticket->delete(); // soft delete

        return redirect()->route('admin.tickets')
            ->with('success', 'Ticket archived successfully.');
    }
}
