<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->fullUrl());

        if ($request->query('referral')) {
            session(['referrer' => $request->query('referral')]);
            // return redirect($request->url())->withCookie(cookie()->forever('referral', $request->query('ref')));
        }

        return $next($request);
    }
}
