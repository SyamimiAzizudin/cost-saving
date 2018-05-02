<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckSubsidiary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( Auth::check() && Auth::user()->role == 'subsidiary' ) {
            return $next($request);
        }
        // return back()->withMessage('You dont have permission !');
        return redirect()->back()->with('permission', 'You dont have permission !');
    }


}
