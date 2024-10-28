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
        /* * {
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
  } */

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
            padding: 35px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
        }

        a.verify-btn {
            background: #52D017;
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            line-height: 16px;
            font-weight: 400;
            border: none;
            display: inline-block;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 20px;
            padding-right: 20px;
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
            padding: 40px;
            text-align: left;
        }

        .message-wrap .message-title {
            font-size: 12px;
            line-height: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            text-align: left;
        }

        .message-wrap .message {
            font-size: 10px;
            line-height: 13px;
            font-weight: 300;
            color: #000000;
            margin-bottom: 15px;
        }
    </style>
</head>

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">

    <div class="contain">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
            alt="transport notifiaction" title="transport notifiaction"></a>
        <h2>Hi,</h2>
        <p class="adjust-space">You have received a new message from {{ $data['user']->username }} for
            {{ $data['quotes']->vehicle_make }} {{ $data['quotes']->vehicle_model }}
            @if (!is_null($data['quotes']->vehicle_make_1) && !is_null($data['quotes']->vehicle_model_1))
                / {{ $data['quotes']->vehicle_make_1 }} {{ $data['quotes']->vehicle_model_1 }}
            @endif
            delivery.
        </p>
        <div class="message-wrap">
            <p class="message-title"> {{ $data['user']->username }} sent you to message</p>
            <p class="message">{{ $data['message'] }}</p>
            {{-- <a class="verify-btn"  
			href="{{ url('transporter/new-jobs-new') }}"  
			style="color:#ffffff;">Reply</a> --}}
            @if ($data['from_page'] == 'delivery')
                <a href="{{ route('transporter.current_jobs', ['id' => $data['quote_by_transporter_id']]) }}"
                    target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                            style="word-break: break-word; line-height: 32px;"><strong>Reply <svg width="22"
                                    height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg></strong></span></span>
                </a>
            @elseif($data['from_page'] == 'delivery_admin')
                <a href="{{ route('front.user_deposit', $data['quote_id']) }}" target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                            style="word-break: break-word; line-height: 32px;"><strong>Reply <svg width="22"
                                    height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg></strong></span></span>
                </a>
            @elseif($data['from_page'] == 'quotes_admin')
                <a href="{{ route('front.messages', ['thread_id' => $thread_id]) }}" target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                            style="word-break: break-word; line-height: 32px;"><strong>Reply <svg width="22"
                                    height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg></strong></span></span>
                </a>
            @elseif($data['from_page'] == 'message_admin')
                <a href="{{ route('front.messages', ['thread_id' => $thread_id]) }}" target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                            style="word-break: break-word; line-height: 32px;"><strong>Reply <svg width="22"
                                    height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg></strong></span></span>
                </a>
            @else
                <a href="{{ route('transporter.messages', ['thread_id' => $thread_id]) }}" target="_blank"
                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#52d017;border-radius:2px;width:auto;border-top:0px solid #8a3b8f;font-weight:400;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span
                        style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                            style="word-break: break-word; line-height: 32px;"><strong>Reply <svg width="22"
                                    height="18" viewBox="0 0 22 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.4383 1.62195L18.2695 16.5657C18.0305 17.6204 17.407 17.8829 16.5211 17.386L11.693 13.8282L9.3633 16.0688C9.10548 16.3266 8.88986 16.5423 8.39298 16.5423L8.73986 11.6251L17.6883 3.53914C18.0774 3.19226 17.6039 3.00008 17.0836 3.34695L6.02111 10.3126L1.25861 8.82195C0.222672 8.49851 0.203922 7.78601 1.47423 7.28914L20.1024 0.112577C20.9649 -0.210861 21.7195 0.304764 21.4383 1.62195Z"
                                        fill="white" />
                                </svg></strong></span></span>
                </a>
            @endif
        </div>

        <p class="adjust-space">Note: Please click the button above to message the transport provider, don't reply
            directly to this message.</p>
        <p>
            Best Regards,
        </p>
        <p class="adjust-half-space">Transport Any Car Team</p>
        <p class="adjust-half-space">Manage notification <a href="{{ url('transporter/manage_notification') }}"
                style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p>© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
