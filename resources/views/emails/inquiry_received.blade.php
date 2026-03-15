<html>

<body>
    <h2>New inquiry received</h2>
    <p><strong>Type:</strong> {{ $inquiry->type }}</p>
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email }}</p>
    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($inquiry->message)) !!}</p>
</body>

</html>