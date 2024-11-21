<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <style>
      
        h1,
        h2,
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
            /* text-align: center; */
            padding: 0;
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

<body style="margin: 0; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <div class="contain" style="text-align: center;">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
            alt="transport notifiaction" title="transport notifiaction" />
        <h2>Hi,</h2>
        <p class="adjust-space">You have accepted {{ $data['transporter_info']->username }} quote of £{{ $data['quotation']->price }} to deliver your {{ $data['quotation']->quote->vehicle_make}} {{$data['quotation']->quote->vehicle_model}} @if (!empty($data['quotation']->quote->vehicle_make_1) && !empty($data['quotation']->quote->vehicle_model_1)) @endif</p>
        <div class="message-wrap" style="text-align: center;">
            <p class="message">Payment ref:{{ $data['transaction_id'] }}</p>
            <p class="message">Booking ref: {{ $data['booking_ref'] }}</p> 
            <p class="message">Deposit paid: {{ $data['quotation']->deposit }}</p>
            <p class="message">Remaining balance:£{{ $data['quotation']->transporter_payment }}</p>
            <p class="message">Total: £{{ $data['quotation']->price }}</p> 
            <p class="message">Pay the remaining amount of £{{ $data['quotation']->transporter_payment }} directly to {{ $data['transporter_info']->username }}.</p>
        </div>
            <p class="adjust-space">What Happens Next:</p>
            <p>The transport provider will contact you to arrange the delivery of you vehicle.</p>
            <p class="adjust-space">Transporter Contact Details:</p>
            <p>Phone number: {{$data['transporter_info']->mobile}}</p>
            <p>Email: {{$data['transporter_info']->email}}</p>
            <p class="adjust-half-space">Best Regards,</p>
            <p class="adjust-half-space" style="margin-bottom: 60px;">Transport Any Car Team</p>
            <p class="adjust-half-space">Manage notification <a href="{{ url('transporter/manage_notification') }}"
                style="color:#0356D6; text-decoration: none;">preferences.</a></p>
            <p style=" font-size: 12px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
