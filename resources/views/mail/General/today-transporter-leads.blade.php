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
            color:#ffffff;
            text-decoration: none;
            font-size: 12px;
            line-height:16px;
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
        
    </style>
</head>

<body>
    <div class="contain">
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg" style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction" title="transport notifiaction"></a>
        <h2>Hi {{$quote['name']}},</h2>
        <p class="adjust-space">We’ve posted {{$quote['last24HoursCount']}} transport leads today. We understand it can be hard to keep up with them all so heres a reminder to check them out. Remember customers prefer quick responses so its worth reviewing your leads at least once a day.</p>
        <a class="verify-btn"  href="{{ url('transporter/new-jobs-new') }}"  style="color:#ffffff;">View leads</a>
        <p class="adjust-space">You can view and place bids on your transport leads in <a href="{{ url('transporter/new-jobs-new') }}" style="color:#0356D6; text-decoration: none;">your dashboard here</a>.</p>
        <p>
            Best Regards,
        </p>
        <p class="adjust-half-space">Transport Any Car Team</p>
        <p class="adjust-half-space">Manage notification <a href="{{ url('transporter/manage_notification') }}" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p>© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
    {{-- <a href="{{ $verificationLink }}">Verify Email</a> --}}
    {{-- <p>If you did not create an account, please ignore this email.</p> --}}

{{-- {{$quote->last24HoursCount}}
{{ url('transporter/new-jobs-new') }}

    {{ url('transporter/manage_notification') }} --}}
</body>

</html>
