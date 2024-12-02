<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">
    <div style="max-width: 600px;width: 100%;margin: auto;text-align: center;box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction"
            title="transport notifiaction" />
        <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">
            {{ $data['transport_name'] }} has
            @if ($data['price_reduced'])
                reduced
            @else
                increased
            @endif
            their quote from
        </p>
        <p style="margin-top: 25px; margin-bottom: 25px; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;"><strong>£{{ number_format($data['old_price'], 0) }} to £{{ $data['new_price'] }}.</strong></p>
        <a style="background: #52D017; border-radius: 50px; color: #ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block; padding-top: 10px; padding-bottom: 10px; padding-left: 40px; padding-right: 40px; cursor: pointer;" href="{{ route('front.quotes', $data['quote_id']) }}">View quote ></a>
        <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Note: The price quoted is the final amount, no hidden fees or charges.</p>
        <p style="margin-top: 0; margin-bottom: 0; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Best Regards,</p>
        <p class="adjust-half-space" style="margin-top: 12px; margin-bottom: 60px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Transport Any Car Team</p>
        <p class="adjust-half-space" style="margin-top: 12px; margin-bottom: 12px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Manage notification <a href="{{ url('/manage_notification') }}" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p style="font-size: 16px; line-height: 22px; font-weight: 300; font-family: 'Outfit', sans-serif;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
