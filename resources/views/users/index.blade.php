<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Works in</th>
			<th>Role</th>
		</tr>
		@foreach ($users as $user)
		<tr>
			<td> {{ $user->first_name }} </td>
			<td> {{ $user->last_name }} </td>
			<td> {{ $user->email }} </td>
			<td> {{ $user->facility->name }} </td>
			<td> {{ $user->role->description }} </td>
			<td>
				<button><a href="{{ url('/users/edit/'.$user->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/users/delete/'.$user->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>