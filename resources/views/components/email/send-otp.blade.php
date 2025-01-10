<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Send Mail</title>
</head>
<body>
	<p>
		Hello {{ $details['user'] }}, thank you for joining with us. Please use the OTP code below on the Nagadat.com to complete your registratuion.<br>
		<h3>{{ $details['otp'] }}</h3>
		If you didn't request this, you can ignore this email or let us know. Help line: 09602444444<br><br>

		Thanks!<br>
		Nagadhat Bangladesh Ltd.
	</p>
</body>
</html>