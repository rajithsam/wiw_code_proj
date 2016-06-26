<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

/**
 * This is ONLY for demonstrating the api
 * There is no actual Auth being used! ONLY
 * a user id needs to be specified to "authenticate".
 * In real applications, legitimate authentication
 * methods should be used!
 */
class BarelyAuthManager
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
        if( $request->has('user_id') && User::find($request->input('user_id'))->isManager() )
        {
          return $next($request);
        }
        return response('Unauthorized. You must be a manager to deal with this.', 401);
    }
}
