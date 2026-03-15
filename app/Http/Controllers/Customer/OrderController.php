<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display customer orders
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $user->orders()->paginate(10);

        return view('customer.orders.index', ['orders' => $orders]);
    }

    /**
     * Show order details
     */
    public function show(Order $order)
    {
        // Check if order belongs to user
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        return view('customer.orders.show', ['order' => $order]);
    }

    /**
     * Download order invoice
     */
    public function downloadInvoice(Order $order)
    {
        // Check if order belongs to user
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // Generate or retrieve PDF
        // For now, return to order detail
        return redirect()->route('account.customer.orders.show', $order);
    }
}
