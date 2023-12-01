<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnableCors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization', 'ngrok-skip-browser-warning');
    }
}
