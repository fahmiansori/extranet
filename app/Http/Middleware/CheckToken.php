<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Cache;

class CheckToken
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
        $access_token = Cache::get('access_token');

        if(!$access_token){
            return redirect('/');
        }

        return $next($request);
    }
}
