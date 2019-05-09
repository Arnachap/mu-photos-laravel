<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()) {
            if (auth()->user()->isAdmin) {
                return $next($request);
            }
        }

        return redirect('/connexion')->with('error', 'Vous n\'avez pas accès à cette page');
    }
}