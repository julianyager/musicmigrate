@extends('layouts.app')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Ads
            <a class="btn btn-success pull-right" href="{{ route('ads.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            @if($ads->count())
	                <table class="table table-condensed table-striped">
	                    <thead>
	                        <tr>
	                            <th>Ad ID</th>
								<th>Ad Title</th>
								<th>Ad Expiraton</th>
								<th>Description</th>
								<th>User ID</th>
								<th>Username</th>
								<th>Email</th>
								<th>Date Created</th>
								<th>Updated Last</th>
	                            <th class="text-right">OPTIONS</th>
	                        </tr>
	                    </thead>

	                    <tbody>
	                        @foreach($ads as $ad)
	                            <tr>
	                                <td>{{ $ad->id }}</td>
									<td> {{ $ad->title }} </td>
									<td>
									@if($ad->expire_on !== null)
										{{ $ad->expire_on }}
									@else
										No Expiry date
									@endif
									</td>
									<td> {{ $ad->description }}</td>
									<td> {{ $ad->user_id }} </td>
									<td> {{ $ad->user->name }} </td>
									<td> {{ $ad->user->email }} </td>
									<td> {{ $ad->title }} </td>
									<td> {{ $ad->user->created_at }} </td>
									<td> {{ $ad->user->updated_at }} </td>
	                                <td class="text-right">
	                                    <a class="btn btn-xs btn-primary" href="{{ route('ads.show', $ad->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
	                                    <a class="btn btn-xs btn-warning" href="{{ route('ads.edit', $ad->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
	                                    <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
	                                        <input type="hidden" name="_method" value="DELETE">
	                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
	                                    </form>
	                                </td>
	                            </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	                {!! $ads->render() !!}
	            @else
	                <h3 class="text-center alert alert-info">Empty!</h3>
	            @endif

	        </div>
    </div>

@endsection
