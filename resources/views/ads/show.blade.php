@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $ad->title }}</div>

				<div class="panel-body">
					<p>
						<strong>Description:</strong>
						{{ $ad->description }}
					</p>
					<br>
					<p>
						<strong>Genre:</strong> {{ $ad->genre->name }}
					</p>
					<p>
						<strong>Instrument:</strong>
						@if(count($ad->instruments))
							@foreach ($ad->instruments as $instrument)
								{{ $instrument->name }}@if($instrument != $ad->instruments->last()), @endif
							@endforeach
						@else
							None
						@endif
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
