<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationValidator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('rid') || !$request->session()->has('tid'))
            return redirect('/')->with('fail', 'invalidregistration');


        return $next($request);
    }
}
