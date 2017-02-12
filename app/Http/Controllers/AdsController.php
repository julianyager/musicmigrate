<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ad;
use App\Genre;
use App\User;
use Auth;

class AdsController extends Controller
{
	/**
	 * Show a single ad from inputted ID
	 * @param  INTEGER $id
	 * @return RESPONSE
	 */
	public function show($id)
	{
		$ad = Ad::findOrFail($id);

		return view('ads.show', compact('ad'));
	}

	/**
	 * Show all of a user's ads
	 * @return RESPONSE
	 */
	public function showMyAds()
	{
		$user = Auth::user();
        return view('ads.adlist')->withAds($user->ads);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$ad = new Ad();

		$ad->user_id = $request->user_id;
		$ad->title = $request->input("title");
		$ad->expireon = $request->input("expire_on");
		$ad->description = $request->input("description");
		$ad->genre->name = $request->input("name");

		$ad->save();

		return redirect()->route('ads.index')->with('message', 'Item created successfully.');
	}


		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index()
		{
			$ads = Ad::orderBy('id', 'desc')->paginate(10);

			return view('ads.index', compact('ads'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			return view('ads.create');
		}


		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			$ad = Ad::findOrFail($id);

			return view('ads.edit', compact('ad'));
		}


		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @param Request $request
		 * @return Response
		 */
		public function update(Request $request, $id)
		{
			$ad = Ad::findOrFail($id);



			$ad->save();

			return redirect()->route('ads.index')->with('message', 'Item updated successfully.');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			$ad = Ad::findOrFail($id);
			$ad->delete();

			return redirect()->route('ads.index')->with('message', 'Item deleted successfully.');
		}


}
