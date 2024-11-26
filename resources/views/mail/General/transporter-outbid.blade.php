<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet" type="text/css"><!--<![endif]--> --}}

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <style>
/*{
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            text-align: center!important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        .desktop_hide,
        .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
        }

        .image_block img+div {
            display: none;
        }

        @media (max-width:620px) {
            .mobile_hide {
                display: none;
            }

            .row-content {
                width: 100% !important;
            }

            .stack .column {
                width: 100%;
                display: block;
            }

            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }

            .row-1 .column-1 .block-2.paragraph_block td.pad,
            .row-1 .column-1 .block-4.paragraph_block td.pad {
                padding: 25px 30px 20px !important;
            }
        }*/
      /*  body {
            text-align: center;
        }
        h2,
        p,
        body {
            margin: 0;
            font-weight: 300;
            font-family: "Outfit", sans-serif;
            font-size: 10px;
            line-height: 13px;
        }

        p {
            font-weight: 300;
            font-family: "Outfit", sans-serif;
            font-size: 10px;
            line-height: 13px;
        } */

        h1,h2,
        p {
            margin: 0;
        }
        h2,
        p,
        body {
            margin: 0;
            font-weight: 300;
            font-family: "Outfit", sans-serif;
            font-size: 16px;
            line-height: 22px;
        }

        .contain {
            max-width: 600px;
            width: 100%;
            margin: auto;
            text-align: center;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
        }

        .verify-btn {
            background: #52D017;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
            border: none;
            display: inline-block;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 30px;
            padding-right: 30px;
            cursor: pointer;
        }

        .adjust-space {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .adjust-half-space {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .message-wrap {
            background-color: #f1f1f1;
            padding: 20px;
            text-align: left;
        }

        .message-wrap .message-title {
            font-size: 20px;
            line-height: 24px;
            font-weight: 500;
            margin-bottom: 10px;
            text-align: left;
        }

        .message-wrap .message {
            font-size: 16px;
            line-height: 20px;
            font-weight: 300;
            color: #000000;
            margin-bottom: 15px;
        }
    </style>
</head>

<body style="margin: 0; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; text-align:center;">
<div class="contain" style=" max-width: 600px;width: 100%;margin: auto;text-align: center;padding: 0;box-sizing: border-box;">
     <!--<p><a href="{{route('transporter.profile', ['unsub' => true]) }}" target="_blank" style="text-decoration: underline; color: #5f5f5f;" rel="noopener">Unsubscribe from outbid emails</a></p>-->
    <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
        style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
        alt="transport notifiaction" title="transport notifiaction"/>

        <h2 style=" margin: 0;font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px;">Hi, {{$transporter_name}}</h2>

    <!--<h3 style="font-size: 22px; line-height: normal;">Outbid <span style="color: #018dd4;">alert</span></h3>-->
    <p class="adjust-space">You have been outbid for the 
        {{$quote->vehicle_make}} {{$quote->vehicle_model}} 
        delivery, reduce your bid now for a better chance of winning.</p>
    <a 
    href="{{route('transporter.current_jobs', ['source' => 'email','quote-id' => $quote->id])}}" 
    class="verify-btn" style="border-radius: 50px; margin-bottom: 25px;  background: #52D017; color: #ffffff; text-decoration: none; font-size: 16px; line-height: 20px; font-weight: 400; border: none; display: inline-block; padding-top: 6px; padding-bottom: 6px; padding-left: 30px; padding-right: 30px; cursor: pointer;">
        Place bid
    </a>
    <p>Best Regards,</p>
    <p class="adjust-half-space" style="margin-bottom: 60px;">Transport Any Car Team</p>
    <p class="adjust-half-space">Manage notification <a 
        href="{{ url('transporter/manage_notification') }}"
            style="color:#0356D6; text-decoration: none;">preferences.</a></p>
        <!--     <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"-->
        <!--style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"-->
        <!--alt="transport notifiaction" title="transport notifiaction"/>-->
    <p style="margin: 0; margin-bottom: 16px; color: #000; font-size: 12px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    <!--<p><a href="{{route('transporter.profile', ['unsub' => true]) }}" target="_blank" style="text-decoration: underline; color: #5f5f5f;" rel="noopener">Unsubscribe from outbid emails</a></p>-->
</div>
</body>


</html>
