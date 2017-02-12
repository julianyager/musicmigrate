@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $ad->title }}</div>

				<div class="panel-body">

					<p>
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

            </div>
        </div>
    </div>
</div>
@endsection
