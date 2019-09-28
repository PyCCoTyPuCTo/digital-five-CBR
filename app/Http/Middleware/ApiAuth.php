<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\User;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->token) {
            return request()->header(['authorize' => false]);
        }

        $user = User::where('remember_token', $request->token)->first();
        if (!$user) {
            return new Response(['Message' => 'Non Authorize'], 401);
        }

        $request->user = $user;
        return $next($request);
    }
}
