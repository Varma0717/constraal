<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\InquiryReceived;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Simple honeypot spam protection: field must be empty
        if ($request->filled('hp_name')) {
            return redirect()->route('contact')->with('status', 'Thank you — message received.');
        }

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'company' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:120',
            'inquiry_type' => 'required|in:general,partnership,press,early_interest',
            'preferred_contact' => 'nullable|in:email,phone',
            'use_case' => 'nullable|string|max:1000',
            'message' => 'required|string',
        ]);

        // Handle early interest subscriptions
        if ($data['inquiry_type'] === 'early_interest') {
            $subscriber = Subscriber::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'source' => 'contact_form',
                ]
            );

            // Send confirmation email
            try {
                Mail::raw(
                    'Thank you for your interest in Constraal early updates. We\'ll keep you posted on platform milestones and research updates.',
                    function ($message) use ($subscriber) {
                        $message->to($subscriber->email)
                            ->subject('Welcome to Constraal Updates - ' . config('app.name'));
                    }
                );
            } catch (\Exception $e) {
                // Log but don't fail
            }

            return redirect()->route('contact')->with('status', 'Thank you for your interest! Check your email to confirm.');
        }

        // Create inquiry for other types
        $metaArray = array_filter([
            'company' => $data['company'] ?? null,
            'phone' => $data['phone'] ?? null,
            'country' => $data['country'] ?? null,
            'preferred_contact' => $data['preferred_contact'] ?? null,
            'use_case' => $data['use_case'] ?? null,
        ]);

        try {
            $inquiry = Inquiry::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => ucfirst(str_replace('_', ' ', $data['inquiry_type'])),
                'message' => $data['message'],
                'status' => 'New',
                'metadata' => !empty($metaArray) ? $metaArray : null,
            ]);
        } catch (\Exception $e) {
            Log::error('Inquiry creation failed: ' . $e->getMessage());
            return redirect()->route('contact')->with('status', 'Thank you — we received your message.');
        }

        // Send admin notification email (best-effort)
        try {
            Mail::to(config('mail.from.address', env('ADMIN_EMAIL', 'admin@constraal.example')))
                ->send(new InquiryReceived($inquiry));
        } catch (\Exception $e) {
            // Logging could be added here
        }

        // Send confirmation to submitter
        try {
            Mail::raw(
                'Thank you for contacting Constraal. We\'ll review your inquiry and get back to you shortly.',
                function ($message) use ($inquiry) {
                    $message->to($inquiry->email)
                        ->subject('Inquiry Received - ' . config('app.name'));
                }
            );
        } catch (\Exception $e) {
            // Log but don't fail
        }

        return redirect()->route('contact')->with('status', 'Thank you — we received your message.');
    }

    /**
     * Separate endpoint for early updates email signup
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'nullable|string|max:255',
            'interest_category' => 'nullable|string|in:general,home,appliances,build',
            'investor_interest' => 'nullable',
            'industrial_partner' => 'nullable',
        ]);

        $subscriber = Subscriber::updateOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['name'] ?? null,
                'source' => 'website_signup',
                'interest_category' => $validated['interest_category'] ?? 'general',
                'investor_interest' => $request->has('investor_interest'),
                'industrial_partner' => $request->has('industrial_partner'),
            ]
        );

        // Send confirmation email
        try {
            Mail::raw(
                'Thank you for subscribing to Constraal updates. We\'ll share research milestones, product announcements, and early access opportunities.',
                function ($message) use ($subscriber) {
                    $message->to($subscriber->email)
                        ->subject('Welcome to Constraal Updates - ' . config('app.name'));
                }
            );
        } catch (\Exception $e) {
            // Log but don't fail
        }

        return redirect()->back()->with('status', 'Successfully subscribed! Check your email.');
    }
}
