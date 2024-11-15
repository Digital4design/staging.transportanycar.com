{{-- <!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
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
        }
    </style>
</head>

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
    <tbody>
    <tr>
        <td>
            <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #efefef;">
                <tbody>
                <tr>
                    <td>
                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 600px; margin: 0 auto;" width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                    <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                        <tr>
                                            <td class="pad" style="width:100%;">
                                                <div class="alignment" align="center" style="line-height:10px">
                                                    <div style="max-width: 600px;">
                                                    <p style="margin: 0; font-size: 14px;"><a href="{{route('front.unsubscribe', ['unsub' => true]) }}" target="_blank" style="text-decoration: underline; color: #5f5f5f;" rel="noopener">Unsubscribe from all emails</a></p>
                                                    <a href="https://transportanycar.com/">
                                                    <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="Booking confirmation" title="Booking confirmation"></a>     
                                                    @if($data['price_reduced'])                                                    
                                                         <h3 style="font-size: 22px;line-height: normal;">New reduced <br><span style="color: #018dd4;">quote alert</span> </h3>
                                                    @else
                                                        <!-- <img src="{{asset('assets/images/quote_increase.jpg')}}" style="display: block; height: auto; border: 0; width: 100%;" width="600" alt="New increase quote alert!" title="New increase quote alert!"> -->
                                                        <h3 style="font-size: 22px;line-height: normal;">New increased <br><span style="color: #018dd4;">quote alert</span> </h3>
                                                    @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:10px;padding-left:50px;padding-right:50px;padding-top:30px;">
                                                <div style="color:#000f26;direction:ltr;font-family:'Montserrat', sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:19.2px;">
                                                <p style="margin: 0;">
                                                    {{ $data['transport_name'] }} has 
                                                    @if($data['price_reduced'])
                                                        reduced
                                                    @else
                                                        increased
                                                    @endif
                                                    their quote from
                                                </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="paragraph_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:20px;padding-left:50px;padding-right:50px;padding-top:5px;">
                                                <div style="color:#000f26;direction:ltr;font-family:'Montserrat', sans-serif;font-size:24px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:28.799999999999997px;">
                                                    <p style="margin: 0;"><strong>£{{ number_format($data['old_price'], 0) }} to £{{ ($data['new_price']) }}.</strong></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #efefef;">
                <tbody>
                <tr>
                    <td>
                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-radius: 0; color: #000000; width: 600px; margin: 0 auto;" width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                    <table class="button_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                        <tr>
                                            <td class="pad">
                                                <div class="alignment" align="center"><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://transportanycar.com/" style="height:42px;width:203px;v-text-anchor:middle;" arcsize="72%" stroke="false" fillcolor="#52d017">
                                                        <w:anchorlock/>
                                                        <v:textbox inset="0px,0px,0px,0px">
                                                            <center style="color:#ffffff; font-family:sans-serif; font-size:16px">
                                                    <![endif]--><a href="{{route('front.quotes', $data['quote_id'])}}" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:30px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:50px;padding-right:50px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="word-break: break-word; line-height: 32px;"><strong>View quote &gt;</strong></span></span></a><!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #efefef;">
                <tbody>
                <tr>
                    <td>
                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; border-radius: 0; color: #000000; width: 600px; margin: 0 auto;" width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                    <table class="paragraph_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-right:50px;padding-top:15px;">
                                                <div style="color:#000f26;direction:ltr;font-family:'Montserrat', sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                                    <p style="margin: 0;"><strong>Note: </strong>The price quoted is the final amount, no hidden fees or charges.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:35px;padding-left:50px;padding-right:50px;padding-top:15px;">
                                                <div style="color:#000f26;direction:ltr;font-family:'Montserrat', sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:19.2px;">
                                                    <p style="margin: 0; margin-bottom: 16px;">Best regards,</p>
                                                    <p style="margin: 0;">The Transport Any Car Team</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #efefef;">
                <tbody>
                <tr>
                    <td>
                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; border-radius: 0; color: #000000; width: 600px; margin: 0 auto;" width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                    <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:30px;width:100%;">
                                                <div class="alignment" align="center" style="line-height:10px">
                                                    <div style="max-width: 180px;"><a href="https://transportanycar.com/"><img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100%;" width="180" alt="transport any car" title="transport any car"></a></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-bottom:40px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                <div style="color:#ffffff;direction:ltr;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                                    <p style="margin: 0; margin-bottom: 16px; color: #000;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
                                                    <p style="margin: 0;"><a href="{{route('front.unsubscribe', ['unsub' => true]) }}" target="_blank" style="text-decoration: underline; color: #717171;" rel="noopener">Unsubscribe from all emails</a></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table><!-- End -->
</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        h2,
        body {
            margin: 0;
            font-weight: 300;
            font-family: "Outfit", sans-serif;
            font-size: 10px;
            line-height: 13px;
        }

        h1,
        h2,
        p {
            margin: 0;
        }
      
        .contain {
            max-width: 600px;
            width: 100%;
            margin: auto;
            text-align: center;
            /* padding: 35px; */
            box-sizing: border-box;
        }

        h1 {
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
        }
        a.verify-btn {
            background: #52D017;
            color:#ffffff;
            text-decoration: none;
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
            border: none;
            display: inline-block;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 40px;
            padding-right: 40px;
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
        
    </style>
</head>

<body>
    <div class="contain">
        {{-- <h1>Verify Your Email and Activate Your TransportAnyCar.com Account.</h1> --}}
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction" title="transport notifiaction"></a>
       
        {{-- <p class="adjust-space">Please verify your email address to activate your account.</p> --}}
        <p class="adjust-space">
            {{ $data['transport_name'] }} has 
            @if($data['price_reduced'])
                reduced
            @else
                increased
            @endif
            their quote from
        </p>
        <p class="adjust-space"><strong>£{{ number_format($data['old_price'], 0) }} to £{{ ($data['new_price']) }}.</strong></p>
        <a class="verify-btn" href="{{route('front.quotes', $data['quote_id'])}}" style="color:#ffffff; border-radius: 50px;">View quote ></a>
        <p class="adjust-space">Note: The price quoted is the final amount, no hidden fees or charges.</p>
        <p>
            Best Regards,
        </p>
        <p class="adjust-half-space" style="margin-bottom: 60px;">Transport Any Car Team</p>
        <p class="adjust-half-space">Manage notification <a href="{{ url('front/manage_notification') }}" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p style=" font-size: 12px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
   
    {{-- <p>If you did not create an account, please ignore this email.</p> --}}
</body>

</html>
