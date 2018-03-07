<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Suppliers</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
		</tr>
		@foreach ($suppliers as $supplier)
		<tr>
			<td> {{ $supplier->name }} </td>
			<td> {{ $supplier->email }} </td>
			<td>
				<button><a href="{{ url('/suppliers/update/'.$supplier->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/suppliers/delete/'.$supplier->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>