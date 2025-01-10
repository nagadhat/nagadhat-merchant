<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && (auth()->user()->user_type == 'vendor' || auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'centralAdmin')) {
            // If user is login
            return $next($request);
        } else {
            Auth::logout();
            // If user is not login
            return redirect()->route('login_check');
        }
    }
}
