<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Assigned</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">

    <table align="center" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td style="background-color: #f8f9fa; padding: 20px; text-align: center;">
                <h2 style="color: #333;">Password Assigned</h2>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff; padding: 20px;">
                <p>Hello {{ $user->name }},</p>
                <p>Your password has been successfully assigned.</p>
                <p><strong>Password:</strong> {{ $password }}</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f8f9fa; padding: 20px;">
                <p>If you have any questions or concerns, please feel free to contact us.</p>
                <p style="text-align: center;"><a href="{{ config('app.url') }}" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none;">Visit Our Website</a></p>
            </td>
        </tr>
    </table>

</body>
</html>
