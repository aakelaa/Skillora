<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Updated</title>
</head>
<body style="font-family: Arial, sans-serif; color: #101323; background: #F6F7FB; margin: 0; padding: 24px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #E4E7EF;">
        <tr>
            <td style="padding: 28px 24px; text-align: center; background: #0F5B54; color: #ffffff;">
                <h1 style="margin: 0; font-size: 22px; letter-spacing: -0.02em;">Skillora</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 28px 24px;">
                <p style="margin: 0 0 16px;">Hi {{ $user->name }},</p>

                @if ($status === 'pending')
                    <p style="margin: 0 0 16px; color: #475069;">Thanks for requesting access to Skillora. Your account request is now pending review, and you will receive another message once it is approved.</p>
                @elseif ($status === 'approved')
                    <p style="margin: 0 0 16px; color: #475069;">Great news — your account has been approved. You can now log in and begin using Skillora.</p>
                @elseif ($status === 'rejected')
                    <p style="margin: 0 0 16px; color: #475069;">Unfortunately, your account request has been rejected. If you believe this is a mistake, please contact our support team for help.</p>
                @endif

                <p style="margin: 0 0 20px; color: #475069;">If you'd like to log in, use the button below:</p>
                <p style="margin: 0 0 24px;">
                    <a href="{{ route('login') }}" style="display: inline-block; background: #0F5B54; color: #ffffff; text-decoration: none; font-weight: bold; padding: 12px 24px; border-radius: 10px; font-size: 14px;">Log in to Skillora</a>
                </p>

                <p style="margin: 0; color: #8A90A6; font-size: 13px;">Thanks,<br>The Skillora Team</p>
            </td>
        </tr>
    </table>
</body>
</html>
