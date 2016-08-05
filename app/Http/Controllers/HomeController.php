<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
	public function index()
	{
		// Get the first user
		$user = User::all()->first();

		// Get the first ads for this user
		$ad = $user->ads->first();

		echo "Ad Author: " . $ad->user->name . '<br>';
		echo "Ad Title: " . $ad->title . '<br>';
		echo "Ad Description: " . $ad->description . '<br><br>';

		// TEST V1: Die and dump all instruments.
		// dd($ad->instruments);

		// TEST V2: Echo out the instruments and die
		$i = 1;
		foreach ($ad->instruments as $instrument) {
			echo "Instrument #" . $i . " is: " . $instrument->name . '<br>';
			$i++;
		}
		die();


		return view('welcome')->withUser($user);
	}
}
