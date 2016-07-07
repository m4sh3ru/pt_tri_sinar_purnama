<?php

namespace App\Http\Middleware;

use Closure, Auth;

class SuperUserMiddleware
{

    public function handle($request, Closure $next)
    {
         if(Auth::user()->level_user != 1){
            return redirect('/admin');
        }
        return $next($request);
    }
}
