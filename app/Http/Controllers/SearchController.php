<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Genre;
use App\Instrument;
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
		$genres = Genre::all();
		$instruments = Instrument::all();
		// Return view of search form
		return view('search', compact('genres', 'instruments'));
	}

	/**
	 * [postIndex description]
	 * @param  Request $request
	 * @return view
	 */
	public function postIndex(Request $request)
	{
		$keyword = $request->get('keyword');
		$genre_id = $request->get('genre');
		$instrument_id = $request->get('instrument');

		// Do eloquent search
		$results = Ad::containsKeywords($keyword)
					->whereGenre($genre_id)
					->whereHas('instruments', function($query) use($instrument_id)
					{
						$query->where('id', '=', $instrument_id);
					})->get();

		$genres = Genre::all();
		$instruments = Instrument::all();

		// Return view with results
		return view('search', compact('genres', 'instruments', 'results'));
	}
}
