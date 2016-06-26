<?php

namespace App\Http\Middleware;

use Closure;

/**
 * This is ONLY for demonstrating the api
 * There is no actual Auth being used! ONLY
 * a user id needs to be specified to "authenticate".
 * In real applications, legitimate authentication
 * methods should be used!
 */
class BarelyAuth
{
    /**
     * Handle an incoming request.
     * (basically just make sure there's a user_id in the request)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // dd($request->has('user_id'));
      if($request->has('user_id'))
      {
        return $next($request);
      }
      return response('Missing User Information',401);
    }
}
