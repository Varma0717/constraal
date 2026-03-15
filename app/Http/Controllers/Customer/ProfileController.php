<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display customer profile
     */
    public function show()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('customer.profile.show', [
            'user' => $user,
            'accountCreated' => $user->created_at->format('M d, Y'),
            'lastLogin' => $user->updated_at->format('M d, Y H:i'),
        ]);
    }

    /**
     * Show profile edit form
     */
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('customer.profile.edit', ['user' => $user]);
    }

    /**
     * Update customer profile
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old picture if exists
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Log activity
        $user->activities()->create([
            'action' => 'profile_updated',
            'description' => 'Profile information updated',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('account.customer.profile.show')->with('success', 'Profile updated successfully');
    }

    /**
     * Show change password form
     */
    public function showChangePassword()
    {
        return view('customer.profile.change-password');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        // Log activity
        $user->activities()->create([
            'action' => 'password_changed',
            'description' => 'Password changed',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Password updated successfully');
    }
}
