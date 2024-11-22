<!DOCTYPE html>
<html>

<head>
    <title>Confirmed, Your Bid for Ford Fiesta Delivery Has Been Accepted.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        h2,
        body {
            margin: 0;
            font-weight: 300;
            font-family: "Outfit", sans-serif;
            font-size: 16px;
            line-height: 22px;
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
            color: #0356D6;
            text-decoration: none;
            font-size: 16px;
            line-height: 20px;
            font-weight: 400;
            display: inline-block;
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
        {{-- <img class="adjust-space" src="{{ asset('/assets/images/transport-logo.jpg') }}" alt="Transport Logo"
            style="max-width:90px"; /> --}}
        <img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
            style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;" alt="transport notifiaction"
            title="transport notifiaction" />

        {{-- <h2>Hi {{ $name }},</h2> --}}
        <p class="adjust-space">Your £{{round($data['price']) }} bid for {{ $data['model'] }} delivery has been accepted by
             {{ $data['username']}}.</p>
        <p>We will send you another email shortly once they have provided their full contact information and full
            delivery details.</p>
        {{-- <p class="adjust-space">Go to booking.</p> --}}
        <p class="adjust-space">Go to <a class="verify-btn" href="{{ $data['url'] }}">booking</a>.</p>
        <p>Best Regards,</p>
        <p class="adjust-half-space" style="margin-bottom: 60px;">Transport Any Car Team</p>
        <p class="adjust-space" style=" font-size: 12px;">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
    {{-- </div> --}}
    {{-- <a href="{{ $verificationLink }}">Verify Email</a> --}}
    {{-- <p>If you did not create an account, please ignore this email.</p> --}}
</body>

</html>