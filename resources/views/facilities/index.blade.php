<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Facilities</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
		</tr>
		@foreach ($facilities as $facility)
		<tr>
			<td> {{ $facility->name }} </td>
			<td> {{ $facility->email }} </td>
			<td> {{ $facility->address }} </td>
			<td>
				<button><a href="{{ url('/facilities/update/'.$facility->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/facilities/delete/'.$facility->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>