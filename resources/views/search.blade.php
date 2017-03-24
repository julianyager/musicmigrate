<!--Once you do, update your local copy, run vagrant destroy -f on your project, and then run vagrant up again and add phpmyadmin.dev into your host file. Shoot me a message if you need help.-->

@extends('layout')

@section('content')
<h1>Search</h1>

<!--routing needed-->
<form method="POST" action="/search">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group">
		<!--input for database needed-->
		<label for="name-field">Search:
			<input type="text" name="keyword" class="form-control" placeholder="Search for a gig.." value="{{ Request::get('keyword') }}"><br>
		</label>

		<label for="name-field">Genre Name
			<select name="genre" class="form-control input-sm" value=""/>
				@foreach($genres as $genre)
				<option value="{{ $genre->id }}" {{ (Request::get('genre') == $genre->id) ? 'selected' : '' }}>{{ $genre->name }}</option>
				@endforeach
			</select>
		</label>

		<label for="name-field">Instrument
			<select name="instrument" class="form-control input-sm" value=""/>
				@foreach($instruments as $instrument)
				<option value="{{ $instrument->id }}" {{ (Request::get('instrument') == $instrument->id) ? 'selected' : '' }}>{{ $instrument->name }}</option>
				@endforeach
			</select>
		</label>
	</div>

	<div class="form-group">
	<button type="submit" class="btn btn-primary">Search</button>up
	</div>
</form>

	@if(isset($results))

	 	@if($results->count())
			<h3>We have {{ $results->count() }} {{ str_plural('result', $results->count()) }}!</h3>

			@foreach($results as $result)
				- {{ $result->title }}<br>
			@endforeach
			<br>
		@else
			No results were found
		@endif

	@endif
@stop
