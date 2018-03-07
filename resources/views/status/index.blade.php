<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Status</h1>

	<table>
		<tr>
			<th>Name</th>
		</tr>
		@foreach ($statuses as $status)
		<tr>
			<td> {{ $status->name }} </td>
			<td>
				<button><a href="{{ url('/status/update/'.$status->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/status/delete/'.$status->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>