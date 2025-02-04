<?php

namespace App\Providers;

use App\Models\Terminal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::viaRequest('tid-auth', function ($request) {
            $tid = $request->session()->get("tid", null);
            if ($tid == null) return null;

            $user = Terminal::where('tid', '=', $tid)->first();
            return $user;
        });
    }
}
