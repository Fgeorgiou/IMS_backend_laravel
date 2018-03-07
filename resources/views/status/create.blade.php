<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Add Status</h1>

	<form method="POST" action="/suppliers/create">
		{{ csrf_field() }}

		Name:<input type="text" name="name" id="name" placeholder="name"> <br>
		Email:<input type="email" name="email" id="email" placeholder="email"> <br>
		<button type="submit"> Add Supplier </button>
	</form>
</body>
</html>