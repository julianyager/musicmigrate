@extends('layouts.bootstrap')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h2><i class="glyphicon glyphicon-plus"></i> Ads / Create </h2>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('ads.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group @if($errors->has('title')) has-error @endif">
					<label for="title-field">Ad Title</label>
					<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
					@if($errors->has("title"))
					<span class="help-block">{{ $errors->first("title") }}</span>
					@endif
				</div>

				<div class="form-group @if($errors->has('description')) has-error @endif">
					<label for="description-field">Description</label>
					<input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
					@if($errors->has("description"))
					<span class="help-block">{{ $errors->first("description") }}</span>
					@endif
				</div>

				<div class="form-group @if($errors->has('genre')) has-error @endif">
					<label for="name-field">Genre Name
						<select name="genre" id="name-field" name="genre" class="form-control input-sm" value="{{ old("genre") }}"/>
							@foreach($genres as $genre)
							<option value="{{ $genre->id }}">{{ $genre->name }}</option>
							@endforeach
						</select>
					</label>
					@if($errors->has("genre"))
					<span class="help-block">{{ $errors->first("genre") }}</span>
					@endif
				</div>

				<div class="form-group @if($errors->has('instrument')) has-error @endif">
					<label for="instrument-field">Instrument
						<select name="instrument" id="instrument-field" class="form-control input-sm" value="{{ old("instrument") }}"/>
							@foreach($instruments as $instrument)
							<option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
							@endforeach
						</select>
					</label>
					@if($errors->has("instrument"))
					<span class="help-block">{{ $errors->first("instrument") }}</span>
					@endif
				</div>


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Submit</button>
					@if(Auth::user()->hasRole('admin'))
                    <a class="btn btn-link pull-right" href="{{ route('ads.index') }}"><i class="glyphicon glyphicon-backward"></i>
					@else
					<a class="btn btn-link pull-right" href="{{ url('/myads') }}"><i class="glyphicon glyphicon-backward"></i>
					@endif
						 Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
