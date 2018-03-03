<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Sign In</h1>

	<form method="post" action="/login">
		{{ csrf_field() }}

		Email:<input type="email" name="email" id="email" placeholder="email"> <br>
		Password:<input type="password" name="password" id="password" placeholder="password"> <br>
		<button type="submit"> Sign In </button>
	</form>
</body>
</html>