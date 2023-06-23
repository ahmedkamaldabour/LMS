<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');

        $response->headers->set('Pragma', 'no-cache');

        $response->headers->set('Expires', \Carbon\Carbon::now());

        return $response;
    }
}
