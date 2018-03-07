<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Product Categories</h1>
	<table>
		<tr>
			<th>Name</th>
		</tr>
		@foreach ($product_categories as $product_category)
		<tr>
			<td> {{ $product_category->name }} </td>
			<td>
				<button><a href="{{ url('/product_categories/update/'.$product_category->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/product_categories/delete/'.$product_category->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>	
</body>
</html>