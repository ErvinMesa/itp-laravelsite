<?php

namespace App\Http\Middleware;

use Closure;

class UserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next,$role)
    {
        if($request->user()->user_role > $role){
            return redirect('home');
        }
        return $next($request);
    }
}
