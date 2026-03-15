<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset — Constraal</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f5f7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f5f7; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #0a1628 0%, #1a2a4a 100%); padding: 30px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Constraal</h1>
                            <p style="color: #8899bb; margin: 5px 0 0; font-size: 14px;">{{ ucfirst($portalType) }} Portal</p>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #1a2a4a; margin: 0 0 15px; font-size: 20px;">Password Reset Request</h2>
                            <p style="color: #555; line-height: 1.6;">Hello {{ $recipientName }},</p>
                            <p style="color: #555; line-height: 1.6;">We received a request to reset the password associated with your account. Click the button below to set a new password:</p>

                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ $resetUrl }}" style="background-color: #667eea; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 6px; font-weight: 600; display: inline-block;">Reset Password</a>
                            </div>

                            <p style="color: #555; line-height: 1.6;">This link will expire in 60 minutes. If you did not request a password reset, you can safely ignore this email.</p>
                            <p style="color: #999; font-size: 13px; line-height: 1.6;">If the button doesn't work, copy and paste this URL into your browser:<br>
                                <a href="{{ $resetUrl }}" style="color: #667eea; word-break: break-all;">{{ $resetUrl }}</a>
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px 30px; text-align: center; border-top: 1px solid #eee;">
                            <p style="color: #999; font-size: 12px; margin: 0;">&copy; {{ date('Y') }} Constraal. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>