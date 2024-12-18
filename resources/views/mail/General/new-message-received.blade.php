<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title>New Message</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <!--<![endif]-->
    <style>
        body {
            font-family: "Outfit", sans-serif;
        }
    </style>
</head>

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none; font-family: 'Outfit', sans-serif;">

    <div style=" font-family: 'Outfit', sans-serif; max-width: 600px; width: 100%; margin: auto; text-align: center; box-sizing: border-box;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
            alt="transport notifiaction" title="transport notifiaction" />
        <h2 style="margin: 0;font-family: 'Outfit', sans-serif;font-weight: 300;font-size: 16px;line-height: 22px;">Hi,</h2>
        <p style="margin-top: 25px; font-family: 'Outfit', sans-serif;margin-bottom: 25px; font-weight: 300; font-size: 16px; line-height: 22px;">You have received a new message from
             {{ $data['user']->username }} for
            {{ $data['quotes']->vehicle_make }} {{ $data['quotes']->vehicle_model }}
            @if (!is_null($data['quotes']->vehicle_make_1) && !is_null($data['quotes']->vehicle_model_1))
                / {{ $data['quotes']->vehicle_make_1 }} {{ $data['quotes']->vehicle_model_1 }}
            @endif
            delivery.
        </p>
        <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 25px; margin-bottom:25px;">If you need any help or have any questions please contact our team on <a href="tel:08081557979">0808 155 7979</a> or email us <a href="mailto:support@transportanycar.com">support@transportanycar.com</a>.</p>
        <div class="message-wrap" style="font-family: 'Outfit', sans-serif; background-color: #f1f1f1; padding-top: 40px; padding-bottom: 40px; padding-left: 40px; padding-right: 40px; text-align: center;">
            <p class="message-title" style="font-family: 'Outfit', sans-serif;font-size: 20px; line-height: 24px; font-weight: 500; margin-bottom: 10px; text-align: left;">
                {{ $data['user']->username }} 
                sent you a message</p>
            <p class="message" style="font-family: 'Outfit', sans-serif;font-size: 16px; line-height: 20px; font-weight: 300; color: #000000; margin-bottom: 15px; text-align:left;">
                {{ $data['message'] }}
            </p>
            <p style="text-align:left; font-family: 'Outfit', sans-serif;">
            @if ($data['from_page'] == 'delivery')
                <a 
                href="{{ route('transporter.current_jobs', ['id' => $data['quote_by_transporter_id']]) }}"
                    target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;">
                        <span style="word-break: break-word; line-height: 32px;">
                            <strong>Reply  
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg>
                            </strong>
                        </span>
                    </span>
                </a>
            @elseif($data['from_page'] == 'delivery_admin')
                <a  href="{{ route('front.user_deposit', $data['quote_id']) }}" 
                target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;">
                        <span style="word-break: break-word; line-height: 32px;">
                            <strong>Reply 
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg>
                            </strong>
                        </span>
                    </span>
                </a>
            @elseif($data['from_page'] == 'quotes_admin')
                <a 
                href="{{ route('front.messages', ['thread_id' => $thread_id]) }}" 
                target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;">
                        <span style="word-break: break-word; line-height: 32px;">
                            <strong>Reply 
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg>
                            </strong>
                        </span>
                    </span>
                </a>
            @elseif($data['from_page'] == 'message_admin')
                <a
                 href="{{ route('front.messages', ['thread_id' => $thread_id]) }}" 
                    target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;">
                        <span style="word-break: break-word; line-height: 32px;">
                            <strong>Reply
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg>
                            </strong>
                        </span>
                    </span>
                </a>
            @else
                <a 
                href="{{ route('transporter.messages', ['thread_id' => $thread_id]) }}" 
                target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;">
                        <span style="word-break: break-word; line-height: 32px;">
                            <strong>Reply
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg>
                            </strong>
                        </span>
                    </span>
                </a>
            @endif
            </p>
        </div>

        <p style="font-family: 'Outfit', sans-serif;margin-top: 25px; margin-bottom: 25px; font-weight: 300;font-size: 16px;line-height: 22px;">Note: Please click the button above to message the transport provider, don't reply
            directly to this message.</p>
        <p style="font-family: 'Outfit', sans-serif;font-weight: 300;font-size: 16px;line-height: 22px;">Best Regards,</p>
        <p style="font-family: 'Outfit', sans-serif;margin-top: 12px; margin-bottom: 60px; font-weight: 300;font-size: 16px;line-height: 22px;">Transport Any Car Team</p>
        <p style="font-family: 'Outfit', sans-serif;margin-top:12px; margin-bottom: 12px; font-weight: 300; font-size: 16px;line-height: 22px;">Manage notification <a 
            href="{{ $data['url'] }}"
                style="font-family: 'Outfit', sans-serif;color:#0356D6; text-decoration: none;">preferences.</a></p>
                <p style="font-weight: 300;  font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px; margin-top: 0; margin-bottom:0;">Transport Any Car &copy; All rights reserved. 2024. TransportAnyCar.com is a limited company registered in England and Wales. Registered address: 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
