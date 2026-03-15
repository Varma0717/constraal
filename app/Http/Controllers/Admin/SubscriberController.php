<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    /**
     * Display a listing of subscribers
     */
    public function index()
    {
        $subscribers = Subscriber::latest('created_at')->paginate(15);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show subscriber details
     */
    public function show(Subscriber $subscriber)
    {
        return view('admin.subscribers.show', compact('subscriber'));
    }

    /**
     * Export subscribers to CSV
     */
    public function export()
    {
        $subscribers = Subscriber::active()->verified()->get();

        $filename = 'subscribers_' . date('Y_m_d_His') . '.csv';

        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
        );

        $handle = fopen('php://output', 'w');

        // CSV header
        fputcsv($handle, ['Name', 'Email', 'Source', 'Subscribed At', 'Verified At']);

        // CSV data
        foreach ($subscribers as $subscriber) {
            fputcsv($handle, [
                $subscriber->name,
                $subscriber->email,
                $subscriber->source,
                $subscriber->created_at->format('Y-m-d H:i:s'),
                $subscriber->verified_at->format('Y-m-d H:i:s'),
            ]);
        }

        fclose($handle);

        return response()->stream(function () {}, 200, $headers);
    }

    /**
     * Mark subscriber as verified
     */
    public function verify(Subscriber $subscriber)
    {
        $subscriber->verify();

        return back()->with('success', 'Subscriber verified');
    }

    /**
     * Unsubscribe user
     */
    public function unsubscribe(Subscriber $subscriber)
    {
        $subscriber->unsubscribe();

        return back()->with('success', 'Subscriber unsubscribed');
    }

    /**
     * Bulk unsubscribe
     */
    public function bulkUnsubscribe(Request $request)
    {
        $ids = $request->input('subscriber_ids', []);

        Subscriber::whereIn('id', $ids)->update(['unsubscribed_at' => now()]);

        return back()->with('success', count($ids) . ' subscribers unsubscribed');
    }

    /**
     * Delete subscriber
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('success', 'Subscriber deleted');
    }

    /**
     * Get subscriber stats
     */
    public function stats()
    {
        return response()->json([
            'total' => Subscriber::count(),
            'active' => Subscriber::active()->count(),
            'verified' => Subscriber::verified()->count(),
            'unsubscribed' => Subscriber::whereNotNull('unsubscribed_at')->count(),
        ]);
    }
}
