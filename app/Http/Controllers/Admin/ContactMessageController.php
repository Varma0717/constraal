<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        $unreadCount = ContactMessage::where('is_read', false)->count();
        return view('admin.contact-messages.index', [
            'messages' => $messages,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function show(ContactMessage $contact_message)
    {
        // Mark as read when viewed
        if (!$contact_message->is_read) {
            $contact_message->update(['is_read' => true, 'read_at' => now()]);
        }

        return view('admin.contact-messages.show', ['message' => $contact_message]);
    }

    public function markAsRead(Request $request, ContactMessage $contact_message)
    {
        $contact_message->update(['is_read' => true, 'read_at' => now()]);

        return back()->with('success', 'Message marked as read');
    }

    public function markAllAsRead(Request $request)
    {
        ContactMessage::where('is_read', false)->update(['is_read' => true, 'read_at' => now()]);

        return back()->with('success', 'All messages marked as read');
    }

    public function destroy(Request $request, ContactMessage $contact_message)
    {
        $contact_message->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_contact_message',
            'target' => 'Message ID: ' . $contact_message->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully');
    }
}
