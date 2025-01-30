<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserSessionValidator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('uid'))
            return redirect('/auth')->with('fail', 'notloggedin');

        return $next($request);
    }
}
