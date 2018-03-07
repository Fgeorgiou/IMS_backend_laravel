<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Add Product Categories</h1>
		<form method="POST" action="/product_categories/create">
		{{ csrf_field() }}

		Name:<input type="text" name="name" id="name" placeholder="name"> <br>
		<button type="submit"> Add Facility </button>
</body>
</html>