@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
					{{-- Current Permissions are: {{Auth::user()->HasRole}} --}}
                    You are logged in {{ Auth::user()->name }}!
                </div>

				<div class="panel-heading">Current Posted Ads</div>

				<div class="panel-body">

						@if(count($ads) > 0)
						Current Posts
							@foreach($ads as $ad)
							<p>
								<a href="{{ url('ad/' . $ad->id) }}">
									{{ $ad->title }}
								</a>
							</p>
							@endforeach
						@else
						You have no ads.
						@endif

				</div>

            </div>
        </div>
    </div>
</div>
@endsection
