<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Add Roles</h1>
		<form method="POST" action="/roles/create">
		{{ csrf_field() }}

		Description:<input type="text" name="description" id="description" placeholder="description"> <br>
		Access Level:<input type="text" name="access_level" id="access_level" placeholder="access_level"> <br>
		<button type="submit"> Add Role </button>
	</form>
</body>
</html>