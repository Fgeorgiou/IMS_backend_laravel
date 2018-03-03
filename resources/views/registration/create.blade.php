<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>
<body>
	<h1>Register</h1>

	<form method="post" action="/register">
		{{ csrf_field() }}

		First Name:<input type="text" name="first_name" id="first_name" placeholder="first_name"> <br>
		Last Name:<input type="text" name="last_name" id="last_name" placeholder="last_name"> <br>
		Email:<input type="email" name="email" id="email" placeholder="email"> <br>
		Password:<input type="password" name="password" id="password" placeholder="password"> <br>
		Password Confirmation:<input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation"> <br>
		<button type="submit"> Register </button>
	</form>
</body>
</html>