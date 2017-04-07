@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-9 col-md-offset-5">
			{{-- Check if we even have any ads for this user --}}
			@if(count($ads) > 0)
					<h3>All of your Ads</h3>
					</div>
	        <div class="col-md-10 col-md-offset-1">

	            <div class="panel panel-default">



						{{-- Loop through the users ads --}}
						@foreach($ads AS $ad)
		                <div class="panel-heading">{{ $ad->title }}</div>
						<div class="panel-body">

							<p>-
								<strong>Genre:</strong> {{ $ad->genre->name }}
							</p>
						</div>

						<div class="panel-footer">
							@if(is_null($ad->expire_on))
								No expiration date
							@else
								Your ad expires on: {{ $ad->expire_on->format('D, M, Y') }}
							@endif
						</div>
						@endforeach

					{{-- No ads, let's display a message to the user--}}
					@else
						You have no ads yet. <a href="{{ route('ads.create') }}">Click here to create one</a>!
					@endif
	            </div>
	        </div>

    </div>
</div>
@endsection
