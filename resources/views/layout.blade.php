<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Music Migrate - @yield('title', 'Home')</title>
	</head>

	<body>
		@section('sidebar')
			This is the master sidebar.
		@show

		<div class="container">
		@yield('content')
		</div>

		@include('partials.footer')
	</body>
</html>
