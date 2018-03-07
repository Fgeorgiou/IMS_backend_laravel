<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Roles</h1>
	<table>
		<tr>
			<th>Description</th>
			<th>Access Level</th>
		</tr>
		@foreach ($roles as $role)
		<tr>
			<td> {{ $role->description }} </td>
			<td> {{ $role->access_level }} </td>
			<td>
				<button><a href="{{ url('/roles/update/'.$role->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/roles/delete/'.$role->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>