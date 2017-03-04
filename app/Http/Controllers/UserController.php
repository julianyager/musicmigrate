<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserController extends Controller
{
	public function __construct()
	{
		// Role middleware with no specific user permissions
		// this will make sure they are simply a user with the role of user
		$this->middleware('role:admin');
	}

	/**
	 * Helper function to determine what order is default
	 */
	public function determineNextOrder($order)
	{
		$order = strtolower($order);
		if (empty($order) || $order == 'desc') return 'asc';
		if ($order == 'asc') return 'desc';
	}

	/**
	 * Helper function to make sure we have a valid sort order being passed in
	 */
	public function validateSortOrder($order)
	{
		$order = strtolower($order);
		return (in_array($order, ['asc','desc'])) ? $order : false;
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$sortby = $request->sortby;
		$sortorder = isset($request->order) ? $request->order : '';
		$sortorder = $this->validateSortOrder($sortorder);

		if ($sortby) {
			switch($sortby) {
				case 'id':
					$users = User::orderBy('id', $sortorder);
					break;

				// Add in other options here
				case 'name':
					$users = User::orderBy('name', $sortorder);
					break;
			}
		} else {
			$users = User::orderBy('id', 'desc');
		}

		$users = $users->paginate(10);
		$next_order = $this->determineNextOrder($sortorder);

		return view('users.index', compact('users'))->withNextOrder($next_order);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = new User();

		$user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));


		$user->save();
		$user->assignRole('user');

		return redirect()->route('users.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
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
		$user = User::findOrFail($id);

		$user->name = $request->input("name");
        $user->email = $request->input("email");

		// Do we have a new password?
		if ($request->input("password") AND !empty($request->input("password"))) {

	        $user->password = bcrypt(trim($request->input("password")));
		}

		$user->save();

		return redirect()->route('users.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return redirect()->route('users.index')->with('message', 'Item deleted successfully.');
	}

}
