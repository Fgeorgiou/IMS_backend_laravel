<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Add Facilities</h1>
	<form method="POST" action="/facilities/create">
		{{ csrf_field() }}

		Name:<input type="text" name="name" id="name" placeholder="name"> <br>
		Email:<input type="email" name="email" id="email" placeholder="email"> <br>
		Address:<input type="text" name="address" id="address" placeholder="address"> <br>
		<button type="submit"> Add Facility </button>
	</form>
</body>
</html>