<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; max-width: 600px;width: 100%;margin: auto;text-align: center;box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction" title="transport notifiaction"></a>
        <h2 style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Hi {{$name}},</h2>
        <p style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom: 25px;">Please verify your email address to activate your account.</p>
        <a style=" background: #52D017; color:#ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block; padding-top: 6px; padding-bottom: 6px; padding-left: 30px; padding-right: 30px; cursor: pointer;" href="{{ $verificationLink }}">Verify Email</a>        <p style="margin-top: 25px; margin-bottom: 25px;">Your link is active for 24 hours. After that you will need to resend the verification email.</p>
        <p style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;margin-top: 0; margin-bottom: 0;">Best Regards,</p>
        <p style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;margin-top: 12px; margin-bottom: 60px;">Transport Any Car Team</p>
        <p style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;margin-top: 12px; margin-bottom: 12px;">Manage notification <a href="{{ url('transporter/manage_notification') }}" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p style=" font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
