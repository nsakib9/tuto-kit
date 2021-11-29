<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
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
        if(request()->input('group') == 'admin'){
        if(Auth::User()->super_admin !== 1)
        return redirect()->back()->with('error','You Can\'t Access This Route');
        }
        return $next($request);
    }
}
