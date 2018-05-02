<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminSubsidiary
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
       if ($request->user()->role == 'admin' || $request->user()->role == 'subsidiary') {
            return $next($request);
        }

        return back()->withErrors('You dont have permission !');
        
    }
}
