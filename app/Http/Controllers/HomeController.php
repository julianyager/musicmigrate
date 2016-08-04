<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
	{
		$user = User::all()->first();

		dd($user->ads[0]);

		return view('welcome')->withUser($user);
	}
}
