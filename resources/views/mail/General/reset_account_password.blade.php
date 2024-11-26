<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
</head>

<body style="margin: 0;font-weight: 300;font-family: 'Outfit', sans-serif;font-size: 16px;line-height: 22px; background-color: #ffffff; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<div style="text-align: center; max-width: 600px;width: 100%;margin: auto;padding: 0;box-sizing: border-box;">
		<img src="https://mcusercontent.com/8992880337eb54b5df095f667/images/91d6d431-803b-d338-b1ae-4ab578715e2c.jpg"
			style="display: block; height: auto; border: 0; width: 100px; margin: 15px auto;"
			alt="transport notifiaction" title="transport notifiaction"></a>
		
		<p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">
			Set up a new password.
		</p>
		<p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">
			Reset your password to your account @if($data['page_type'] == 'admin')
			<a href="{{route('front.forgot_password_view', $data['reset_token'])}}" target="_blank" >here</a>
			@elseif($data['page_type'] == 'user')
			<a href="{{route('front.web_password_upadte', $data['reset_token'])}}" target="_blank" >here</a>
			@elseif($data['page_type'] == 'transporter')
			<a href="{{route('transporter.trans_password_upadte', $data['reset_token'])}}" target="_blank" >here</a>
			@endif
		</p>
		<p style="margin-top: 25px; margin-bottom: 25px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">
			The link will expire in 24 hours. If it expires you must generate a new email and link  <a href="{{route('transporter.forgot_password')}}">here.</a>
		</p>
		<p style="margin-top: 12px; margin-bottom:12px; font-weight: 300; font-family: 'Outfit', sans-serif; font-size: 16px; line-height: 22px;">Best Regards,</p>
		<p style="margin-top: 12px; margin-bottom: 60px;">Transport Any Car Team</p>
		<p style="font-size: 12px; font-weight: 300; font-family: 'Outfit', sans-serif; ">© 2024 Transport Any Car. 128 City Road, London, EC1V 2NX.</p>
	</div>
</body>

</html>