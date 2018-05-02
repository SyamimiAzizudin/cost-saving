<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use App\Company;

use Closure;
use Auth;

class CheckBoard
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
       if ($request->user()->role == 'admin' || $request->user()->role == 'subsidiary' || $request->user()->role == 'board') {
            return $next($request);
        }

        return back()->withErrors('You dont have permission !');
        
    }
}