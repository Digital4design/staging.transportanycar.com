<!DOCTYPE html>
<html>

<head>
    <title>Confirmed, Your Bid for Ford Fiesta Delivery Has Been Accepted.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body style="margin: 0; font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px;">
    <div style="max-width: 600px; width: 100%; margin: auto; text-align: center; box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction" title="transport notifiaction" />
        <p style="margin-top: 25px;margin-bottom: 25px; font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px;">Your £{{round($data['price']) }} bid for {{ $data['model'] }} delivery has been accepted by {{ $data['username']}}.</p>
        <p style="font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px;">We will send you another email shortly once they have provided their full contact information and full delivery details.</p>
        <p style="font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px; margin-top: 25px; margin-bottom: 25px;">Go to <a class="verify-btn" href="{{ $data['url'] }}">booking</a>.</p>
        <p style="font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px;">Best Regards,</p>
        <p style="font-weight: 300; font-family:'Outfit', sans-serif; font-size: 16px;line-height: 22px;margin-top: 12px; margin-bottom: 60px;">Transport Any Car Team</p>
        <p style="font-weight: 300; font-family:'Outfit', sans-serif; margin-top: 25px; margin-bottom: 25px; font-size: 16px; line-height: 22px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>