
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
</head>

<body>
	<h1>All Users in Database</h1>

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@if (isset($users) AND count($users) > 0)
	<ul>
		@foreach ($users as $user)
			<li>
				User: {{ $user->name }} <br>
				Email: {{ $user->email}} <br>
				Password: {{$user->password}}
				@if ($user->ads->first())
					<br>
					Ads: {{ $user->ads->first()->title }}
				@endif
			</li>
		@endforeach
	</ul>
	@endif

	<h2>Add a Test User</h2>
		<form method="POST" action="/admin">
			{{ method_field('POST') }}
			{{ csrf_field() }}

			<p>
				<input type="text" name="name" placeholder="Name" required>
			</p>
			<p>
				<input type="password" name="password" placeholder="Password" required>
			</p>
			<p>
				<input type="email" name="email" placeholder="Email Address" required>
			</p>
			<!--<p>
				<input type="text" name="ad" placeholder="Ad Name" required>
			</p>-->


				<button type="submit">Add User</button>
		</form>
</body>
</html>
