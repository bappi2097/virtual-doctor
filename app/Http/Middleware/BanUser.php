<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BanUser
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
        if (auth()->check() && auth()->user()->hasRole('ban')) {
            abort(403, 'account has ban | contact with admin');
        }
        return $next($request);
    }
}
