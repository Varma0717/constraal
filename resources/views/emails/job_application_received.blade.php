<html>

<body>
    <h2>New job application received</h2>
    <p><strong>Position:</strong> {{ $application->job->title ?? 'Unknown' }}</p>
    <p><strong>Name:</strong> {{ $application->name }}</p>
    <p><strong>Email:</strong> {{ $application->email }}</p>
    <p><strong>Cover letter:</strong></p>
    <p>{!! nl2br(e($application->cover_letter)) !!}</p>
    <p>Resume: {{ $application->resume_path ? 'Attached in admin panel' : 'Not provided' }}</p>
</body>

</html>