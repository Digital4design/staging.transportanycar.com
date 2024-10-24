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
        <img class="adjust-space" src="{{asset('/assets/images/transport-logo.jpg')}}" alt="Transport Logo" style="max-width:90px"; />
        <h2>Hi {{$name}},</h2>
        <p class="adjust-space">Please verify your email address to activate your account.</p>
        <a class="verify-btn" href="{{ $verificationLink }}" style="color:#ffffff;">Verify Email</a>
        <p class="adjust-space">Your link is active for 24 hours. After that you will need to resend the verification email.</p>
        <p>
            Best Regards,
        </p>
        <p class="adjust-half-space">Transport Any Car Team</p>
        <p class="adjust-half-space">Manage notification <a href="#" style="color:#0356D6; text-decoration: none;">preferences.</span></a>
        <p>© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
    </div>
</body>

</html>
