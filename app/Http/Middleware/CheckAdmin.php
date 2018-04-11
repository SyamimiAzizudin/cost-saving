<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Auth;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // SELECT * FROM `users`
    // INNER JOIN companies on company_id = companies.id

    public function handle($request, Closure $next)
    {
        
        if( Auth::check() && Auth::user()->role == 'admin' ) {
            return $next($request);
        }
        
        return back()->withMessage('You dont have permission !');
    }
}
