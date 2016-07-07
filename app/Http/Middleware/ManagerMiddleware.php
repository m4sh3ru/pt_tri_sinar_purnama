<?php

namespace App\Http\Middleware;

use Closure, Auth;

class ManagerMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->level_user == 3){
            return redirect('/admin');
        }
        return $next($request);
    }
}
