<!DOCTYPE html>
<html>
<head>
	<title>Add Users</title>
</head>
<body>
	<h1>Add Users</h1>
	<form method="POST" action="/users/create">
		{{ csrf_field() }}

		First Name:<input type="text" name="first_name" id="first_name" placeholder="first_name"> <br>
		Last Name:<input type="text" name="last_name" id="last_name" placeholder="last_name"> <br>
		Facility:<select name="facility">
			@foreach ($facilities as $facility)
			{
				<option value="{{ $facility->id }}">{{ $facility->name }}</option>
			}
			@endforeach
		</select> <br>
		Role:<select name="role">
			@foreach ($roles as $role)
			{
				<option value="{{ $role->id }}">{{ $role->description }}</option>
			}
			@endforeach
		</select> <br>
		Email:<input type="email" name="email" id="email" placeholder="email"> <br>
		Password:<input type="password" name="password" id="password" placeholder="password"> <br>
		Password Confirmation:<input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation"> <br>
		<button type="submit"> Add User </button>
	</form>
</body>
</html>