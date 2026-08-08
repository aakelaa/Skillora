<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Updated</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827; background: #f8fafc; margin: 0; padding: 24px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden;">
        <tr>
            <td style="padding: 24px; text-align: center; background: #312e81; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px;">Skillora</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 24px;">
                <p style="margin: 0 0 16px;">Hi {{ $user->name }},</p>

                @if ($status === 'pending')
                    <p style="margin: 0 0 16px;">Thanks for requesting access to Skillora. Your account request is now pending review, and you will receive another message once it is approved.</p>
                @elseif ($status === 'approved')
                    <p style="margin: 0 0 16px;">Great news — your account has been approved. You can now log in and begin using Skillora</p>
                @elseif ($status === 'rejected')
                    <p style="margin: 0 0 16px;">Unfortunately, your account request has been rejected. If you believe this is a mistake, please contact our support team for help.</p>
                @endif

                <p style="margin: 0 24px 24px;">If you'd like to log in, use the link below:</p>
                <p style="margin: 0 0 24px;"><a href="{{ route('login') }}" style="color: #312e81; text-decoration: none; font-weight: bold;">Log in to Skillora</a></p>

                <p style="margin: 0; color: #6b7280;">Thanks,<br>The Skillora Team</p>
            </td>
        </tr>
    </table>
</body>
</html>
