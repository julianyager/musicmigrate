<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = '')
    {
		// If the user is a guest, redirect them to our login paginate
		if (Auth::guest()) {
			return redirect('/login');
		}

		// Check for a role
		if (! $request->user()->hasRole($role)) {
			abort(403);
		}

		// If a permission is set (not empty), check for that permission
		if (!empty($permission) AND ! $request->user()->can($permission)) {
			abort(403);
		}

		// Continue the request if they passed the above tests
        return $next($request);
    }
}
