<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = SupportTicket::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        $categories = config('tickets.categories', [
            'billing'       => 'Billing & Payments',
            'technical'     => 'Technical Issue',
            'account'       => 'Account Management',
            'general'       => 'General Inquiry',
            'feature'       => 'Feature Request',
        ]);

        return view('customer.tickets.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        
$validated = $request->validate([
    'title'       => ['required', 'string', 'max:255'],
    'description' => ['required', 'string', 'min:20'],
    'category'    => ['nullable', 'string', 'max:100'],
    
]);


$validated['priority'] = 'medium'; 
    

        $ticket = auth()->user()->tickets()->create($validated);

        return redirect()->route('customer.tickets.show', $ticket)
            ->with('success', 'Your ticket has been submitted. We\'ll get back to you soon.');
    }

    public function show(SupportTicket $ticket): View
    {
        $this->authorize('view', $ticket);
        return view('customer.tickets.show', compact('ticket'));
    }
}
