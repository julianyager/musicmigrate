<!--Once you do, update your local copy, run vagrant destroy -f on your project, and then run vagrant up again and add phpmyadmin.dev into your host file. Shoot me a message if you need help.-->


@extends('layout')

@section('content')
<h1>Search</h1>

<!--routing needed-->
<form method="POST" action="/">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}


		<div class="form-group">
				<!--input for database needed-->
			<input type="text" class="form-control" placeholder="Search for a gig.."><br>
		</div>

		<div class="form-group">
				<button type="submit" class="btn btn-primary"> Search</button>
		</div>
</form>

@stop
