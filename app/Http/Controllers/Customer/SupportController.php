<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupportController extends Controller
{
    /**
     * Display support center
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $tickets = $user->supportTickets()->paginate(10);

        return view('customer.support.index', ['tickets' => $tickets]);
    }

    /**
     * Show create support ticket form
     */
    public function create()
    {
        return view('customer.support.create');
    }

    /**
     * Store support ticket
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'category' => 'required|in:billing,technical,account,other',
            'message' => 'required|string|min:10',
            'priority' => 'required|in:low,medium,high',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $ticket = $user->supportTickets()->create([
            'ticket_number' => 'TICKET-' . strtoupper(Str::random(8)),
            'subject' => $request->subject,
            'description' => $request->message,
            'category' => $request->category,
            'message' => $request->message,
            'priority' => $request->priority,
            'status' => 'open',
        ]);

        $user->activities()->create([
            'action' => 'support_ticket_created',
            'description' => 'Support ticket created: ' . $request->subject,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('account.customer.support.show', $ticket)->with('success', 'Support ticket created');
    }

    /**
     * Show support ticket details
     */
    public function show(SupportTicket $ticket)
    {
        // Check if ticket belongs to user
        if ($ticket->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        return view('customer.support.show', ['ticket' => $ticket]);
    }

    /**
     * Add reply to ticket
     */
    public function reply(Request $request, SupportTicket $ticket)
    {
        // Check if ticket belongs to user
        if ($ticket->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $request->validate(['message' => 'required|string|min:5']);

        $ticket->replies()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'type' => 'customer',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->activities()->create([
            'action' => 'support_ticket_replied',
            'description' => 'Reply added to ticket #' . $ticket->ticket_number,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Reply added to ticket');
    }

    /**
     * Close support ticket
     */
    public function close(Request $request, SupportTicket $ticket)
    {
        // Check if ticket belongs to user
        if ($ticket->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $ticket->update(['status' => 'closed']);

        /** @var User $user */
        $user = Auth::user();
        $user->activities()->create([
            'action' => 'support_ticket_closed',
            'description' => 'Support ticket closed: ' . $ticket->subject,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Support ticket closed');
    }
}
