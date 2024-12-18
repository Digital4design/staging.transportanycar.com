<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet" type="text/css"><!--<![endif]--> --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
</head>

<body style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<div style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; max-width: 600px; width: 100%; margin: auto; text-align: center; padding: 0; box-sizing: border-box;">
    <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
        style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
        alt="transport notifiaction" title="transport notifiaction"></a>
    <h2 style="font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Hi,</h2>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">You have received a quote for <span style="display: block; font-size: 24px; line-height: 30px; font-weight: 500; color:#222222; margin-top: 20px;">£{{$data->price}}</span></p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;"> from {{$data->getTransporters->username}} to deliver your {{$data->quote->vehicle_make}} {{$data->quote->vehicle_model}}</p>
    <a href="{{route('front.quotes', $data->quote->id)}}" style="border-radius: 50px; background: #52D017; color: #ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block; padding-top: 10px; padding-bottom: 10px; padding-left: 40px; padding-right: 40px; cursor: pointer;">
        View quote
    </a>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">You can message the transporter to make arrangements before accepting the quote.</p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">If you need any help or have any questions please contact our team on <a href="tel:08081557979">0808 155 7979</a> or email us <a href="mailto:support@transportanycar.com">support@transportanycar.com</a>.</p>
    <div style="background-color: #f1f1f1; padding: 20px; text-align: left;">
        <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 20px; line-height: 24px; font-weight: 500; margin-bottom: 10px; text-align: left;">{{$user_name}} sent you a message</p>
        <p style="font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 20px; font-weight: 300; color: #000000; margin-bottom: 15px;">{{$data->message}}</p>
        <a  href="{{route('front.messages', ['thread_id' => $thread_id])}}" style="background: #52D017; color: #ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block;  cursor: pointer; padding-top: 6px; padding-bottom: 6px; padding-left: 30px; padding-right: 30px;">Reply</a>
    </div>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">Note: The quote shown is the total amount.  If you are happy with the quote then simply accept it and secure your booking.</p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">You may receive more quotes from our network of transporters so keep an eye out and you can accept your preferred quote at any time.</p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 0; margin-bottom:0;">Best Regards,</p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 12px; margin-bottom: 60px;">Transport Any Car Team</p>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 12px; margin-bottom:12px;">Manage notification <a href="{{ url('/manage_notification') }}" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
    <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 0; margin-bottom:0;">Transport Any Car ©️ All rights reserved. 2024. TransportAnyCar.com is a limited company registered in England and Wales. Registered address: 128 City Road, London, EC1V 2NX.</p>
</div>
</body>

</html>
