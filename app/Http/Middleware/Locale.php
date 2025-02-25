<?php

namespace App\Http\Middleware;

use App\Functions\Neo;
use Closure;
use Illuminate\Http\Request;

class Locale
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
        if (Neo::auth() && Neo::preference('language')) app()->setLocale(Neo::preference('language'));
        else if (session()->has('locale')) app()->setLocale(session()->get('locale'));
        return $next($request);
    }
}
