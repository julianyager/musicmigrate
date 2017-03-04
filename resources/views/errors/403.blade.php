@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Unauthorized</div>

                <div class="panel-body">
                    You {{ Auth::user()->name }}, do not have access to this area. If you feel this is an error, please get in touch with us.
				</div>

            </div>
        </div>
    </div>
</div>
@endsection
