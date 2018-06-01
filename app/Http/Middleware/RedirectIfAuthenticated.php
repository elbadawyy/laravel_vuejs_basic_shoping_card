<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        if (session('not_logged_in_user_cart_items')) {
            session([ 'logged_in_user_cart_items'=>  session('not_logged_in_user_cart_items')   ]);
            $request->session()->forget('not_logged_in_user_cart_items');
        }
        return $next($request);
    }
}
