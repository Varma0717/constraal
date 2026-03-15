<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrivacyController extends Controller
{
    /**
     * Display privacy settings
     */
    public function index()
    {
        return view('customer.privacy.index');
    }

    /**
     * Download account data
     */
    public function downloadData(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Gather user data
        $data = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
            'subscriptions' => $user->subscriptions()->get()->toArray(),
            'invoices' => $user->invoices()->get()->toArray(),
            'orders' => $user->orders()->get()->toArray(),
            'activities' => $user->activities()->get()->toArray(),
        ];

        // Create JSON file
        $filename = 'user-data-' . $user->id . '.json';
        Storage::put('exports/' . $filename, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $user->activities()->create([
            'action' => 'data_exported',
            'description' => 'User account data exported',
            'ip_address' => $request->ip(),
        ]);

        return Storage::download('exports/' . $filename);
    }

    /**
     * Show delete account confirmation
     */
    public function showDeleteAccount()
    {
        return view('customer.privacy.delete-account');
    }

    /**
     * Delete account
     */
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'confirmation' => 'required|accepted',
            'password' => 'required|string',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect']);
        }

        $user->activities()->create([
            'action' => 'account_deleted',
            'description' => 'Account deleted by user',
            'ip_address' => $request->ip(),
        ]);

        $user->delete();

        return redirect()->route('account.customer.login')->with('success', 'Your account has been deleted');
    }

    /**
     * Manage privacy settings
     */
    public function updatePrivacy(Request $request)
    {
        $request->validate([
            'data_collection' => 'required|boolean',
            'analytics' => 'required|boolean',
            'marketing' => 'required|boolean',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'allow_data_collection' => $request->data_collection,
            'allow_analytics' => $request->analytics,
            'allow_marketing' => $request->marketing,
        ]);

        return back()->with('success', 'Privacy settings updated');
    }
}
