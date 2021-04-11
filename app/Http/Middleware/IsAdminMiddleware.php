<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
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
//        dd(Auth::guard('admin')->check());
        if (Auth::guard('admin')->check()) {
//            return redirect('/dashboard');
              return $next($request);
        }
        else{
            return redirect(route('dashboard.login'));
        }
    }
}
