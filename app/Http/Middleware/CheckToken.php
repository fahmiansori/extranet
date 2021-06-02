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
        $is_token_expired = Cache::get('is_token_expired');

        if(!$access_token){
            return redirect('/');
        }
        if(empty($is_token_expired)){
            return redirect('/logout');
        }
        if($is_token_expired == 'true'){
            return redirect('/logout');
        }

        return $next($request);
    }
}
