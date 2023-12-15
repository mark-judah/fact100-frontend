<?php

namespace App\Http\Middleware;

use App\Jobs\PageVisitLogger;
use Closure;
use Illuminate\Http\Request;

class PageVisitsLog
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
        if(strpos($request->userAgent(), 'bot') !== false){
            return $next($request);
        }
        PageVisitLogger::dispatch($request->method(),$request->url(),$request->header('referer'),$request->getLanguages(),$request->userAgent(),
            visitor()->device(),visitor()->platform(),visitor()->browser());
        return $next($request);
    }
}
