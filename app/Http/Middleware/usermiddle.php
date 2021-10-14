<?php

namespace App\Http\Middleware;

use Closure;

class usermiddle
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
        if(!session()->exists('people')){
            return redirect('login');
        }
        return $next($request);
    }

}
