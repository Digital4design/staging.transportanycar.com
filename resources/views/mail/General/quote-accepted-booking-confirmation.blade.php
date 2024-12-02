<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    
</head>

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none; margin: 0; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">
    <div style="text-align: center; max-width: 600px;width: 100%;margin: auto;padding: 0;box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
            alt="transport notifiaction" title="transport notifiaction" />
        <h2>Hi,</h2>
        <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">You have accepted {{ $data['transporter_info']->username }} quote of £{{ $data['quotation']->price }} to deliver your {{ $data['quotation']->quote->vehicle_make}} {{$data['quotation']->quote->vehicle_model}} @if (!empty($data['quotation']->quote->vehicle_make_1) && !empty($data['quotation']->quote->vehicle_model_1)) @endif</p>
        <div style="background-color: #f1f1f1; padding: 20px; text-align: left;">
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Payment ref:{{ $data['transaction_id'] }}</p>
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Booking ref: {{ $data['booking_ref'] }}</p> 
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Deposit paid: £{{ $data['quotation']->deposit }}</p>
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Remaining balance:£{{ $data['quotation']->transporter_payment }}</p>
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Total: £{{ $data['quotation']->price }}</p> 
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; color: #000000;margin-bottom: 15px;">Pay the remaining amount of £{{ $data['quotation']->transporter_payment }} directly to {{ $data['transporter_info']->username }}.</p>
        </div>
            <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">What Happens Next:</p>
            <p>The transport provider will contact you to arrange the delivery of you vehicle.</p>
            <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Transporter Contact Details:</p>
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Phone number: {{$data['transporter_info']->mobile}}</p>
            <p style="font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Email: {{$data['transporter_info']->email}}</p>
            <p class="adjust-half-space" style=" margin-top: 12px; margin-bottom: 12px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Best Regards,</p>
            <p class="adjust-half-space" style="margin-top: 12px; margin-bottom: 60px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Transport Any Car Team</p>
            <p class="adjust-half-space" style="margin-top: 12px; margin-bottom: 12px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Manage notification <a href="{{ url('/manage_notification') }}"
                style="color:#0356D6; text-decoration: none;">preferences.</a></p>
            <p style="font-size: 16px; line-height: 22px; font-weight: 300;font-family: 'Outfit', sans-serif;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
