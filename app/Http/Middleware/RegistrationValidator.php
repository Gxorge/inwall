<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class RegistrationValidator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('rid') || !$request->session()->has('tid'))
            return redirect('/')->with('fail', 'invalidregistration');

        $site = $request->session()->get('rid');
        $terminal = $request->session()->get('tid');
        URL::defaults(['siteId' => $site, 'terminalId' => $terminal]);


        return $next($request);
    }
}
