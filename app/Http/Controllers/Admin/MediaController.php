<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = MediaFile::paginate(20);
        return view('admin.media.index', ['media' => $media]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|max:10240', // 10MB limit
        ]);

        $file = $validated['file'];
        $path = Storage::disk('public')->put('uploads', $file);
        $mimeType = $file->getMimeType();

        // Determine file type
        $type = 'document';
        if (str_starts_with($mimeType, 'image/')) {
            $type = 'image';
        } elseif (str_starts_with($mimeType, 'video/')) {
            $type = 'video';
        }

        MediaFile::create([
            'admin_id' => auth('admin')->id(),
            'name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $mimeType,
            'file_size' => $file->getSize(),
            'type' => $type,
        ]);

        return back()->with('success', 'File uploaded successfully');
    }

    public function destroy(Request $request, MediaFile $media)
    {
        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }
        $name = $media->name;
        $media->delete();

        // Log activity
        \App\Models\AdminActivityLog::create([
            'admin_id' => auth('admin')->id(),
            'action' => 'delete_media',
            'target' => 'Media: ' . $media->name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'File deleted successfully');
    }
}
