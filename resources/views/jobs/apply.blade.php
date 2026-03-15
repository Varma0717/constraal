@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold">Apply — {{ $job->title }}</h1>
<form method="POST" action="{{ route('jobs.apply.store', $job) }}" enctype="multipart/form-data" class="mt-6 space-y-4">
    @csrf
    <input type="text" name="hp_name" style="display:none" tabindex="-1" autocomplete="off">
    <div>
        <label class="block text-sm">Name</label>
        <input name="name" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block text-sm">Email</label>
        <input name="email" type="email" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block text-sm">Cover Letter</label>
        <textarea name="cover_letter" rows="5" class="w-full border p-2 rounded"></textarea>
    </div>
    <div>
        <label class="block text-sm">Resume (PDF, DOC, DOCX; max 5MB)</label>
        <input type="file" name="resume" accept=".pdf,.doc,.docx" class="w-full">
    </div>
    <div>
        <button type="submit" class="px-4 py-2 bg-primary text-white rounded">Submit Application</button>
    </div>
</form>
@endsection