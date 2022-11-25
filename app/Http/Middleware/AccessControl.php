<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Http\Common\UtilClass;
use Illuminate\Http\Response;

class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ( $request->user() ) {
            if ( $request->user()->isFrozen() ) {
                return response()->json(
                    UtilClass::formatResponseData(
                        Response::HTTP_UNAUTHORIZED,
                        'アカウントは凍結されています'
                    )
                , Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
            }
        }
        return $next($request);
    }
}
