<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class IsAuthorized
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Cache::has('token')) {
            return $next($request);
        }
        return redirect('/welcome');
    }
}
