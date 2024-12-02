<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet" type="text/css"><!--<![endif]--> --}}

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    
</head>

<body
    style="margin: 0; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; text-align:center;">
    <div 
        style=" max-width: 600px;width: 100%;margin: auto;text-align: center;padding: 0;box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
            alt="transport notifiaction" title="transport notifiaction" />
        <h2 style=" margin: 0;font-weight: 300;font-family: 'Outfit', sans-serif; font-size: 16px;line-height: 22px;">Hi,
            {{ $transporter_name }}</h2>
        <p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">You have been outbid for the
            {{ $quote->vehicle_make }} {{ $quote->vehicle_model }}
            delivery, reduce your bid now for a better chance of winning.</p>
        <a href="{{ route('transporter.current_jobs', ['source' => 'email', 'quote-id' => $quote->id]) }}"
            class="verify-btn"
            style="border-radius: 50px; margin-bottom: 25px;  background: #52D017; color: #ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block; padding-top: 6px; padding-bottom: 6px; padding-left: 30px; padding-right: 30px; cursor: pointer;">
            Place bid
        </a>
        <p style="margin-top:0; margin-bottom: 0; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Best Regards,</p>
        <p style="margin-top: 12px; margin-bottom: 60px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Transport Any Car Team</p>
        <p style="margin-top: 12px; margin-bottom: 12px; font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Manage notification <a href="{{ url('transporter/manage_notification') }}"
                style="color:#0356D6; text-decoration: none;">preferences.</a></p>
        <p style="margin: 0; margin-bottom: 16px; color: #000;font-size: 16px; line-height: 22px;">© 2024 Transport Any Car. 128 City
            Road, London, EC1V 2NX.</p>
    </div>
</body>


</html>
