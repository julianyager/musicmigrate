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

				<div class="form-group @if($errors->has('name')) has-error @endif">
					<label for="name-field">Genre Name</label>
					<input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
					@if($errors->has("name"))
					<span class="help-block">{{ $errors->first("name") }}</span>
					@endif
				</div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-link pull-right" href="{{ route('ads.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
