<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    //
    public function index()
	{
		//test to find all instrument types
		//test then to find all the remainder tables, then add in to forum and interact further on with everything else you want for filteringpow

		// Return view of search form
		return view('search');
	}
	public function postIndex(Request $request)
	{
		$keyword = $request->get('keyword');

		// Do eloquent search
		$results = Ad::where('title', 'like', '%' . $keyword . '%')->get();

		// Return view with results
		return view('search')->withResults($results);
	}
}
