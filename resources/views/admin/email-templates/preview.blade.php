<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $template->name }} - Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f5f5f5;
            padding: 20px;
        }

        .preview-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .preview-header {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            margin: -20px -20px 20px;
            border-radius: 8px 8px 0 0;
        }

        .preview-meta {
            background: #f8f8f8;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
        }

        .preview-meta strong {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="preview-container">
        <div class="preview-header">
            <h2 style="margin: 0;">Email Preview</h2>
        </div>

        <div class="preview-meta">
            <p><strong>Template:</strong> {{ $template->name }}</p>
            <p><strong>Subject:</strong> {{ $template->subject }}</p>
        </div>

        <div class="preview-body">
            {!! $template->body !!}
        </div>
    </div>
</body>

</html>