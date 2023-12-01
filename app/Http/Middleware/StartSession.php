<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class StartSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::isStarted()) {
            Session::start();
        }

        return $next($request);
    }
}
