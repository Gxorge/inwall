<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\RegistrationValidator;
use App\Http\Middleware\ReverseRegistrationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('register');})->middleware(ReverseRegistrationValidator::class);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/home', function () { return view('home');})->middleware(RegistrationValidator::class);
Route::get('/time', function () { return view('time');})->middleware(RegistrationValidator::class);

Route::get('/countdown/setup', function () { return view('countdown-setup');})->middleware(RegistrationValidator::class);
Route::get('/countdown', function (Request $request) {
    $time = $request->get('time');
    $unit = $request->get('unit');
    $warning = $request->get('warning');
    if ($time == null || $unit == null || $warning == null)
        return redirect('/countdown/setup');

    if (!is_numeric($time) || !is_numeric($warning))
        return redirect('/countdown/setup');

    if ($unit != "Seconds" && $unit != "Minutes" && $unit != "Hours")
        return redirect('/countdown/setup')->withErrors(['unit' => 'Invalid unit.']);

    return view('countdown')->with(['time' => $time, 'unit' => $unit, 'warning' => $warning]);
})->middleware(RegistrationValidator::class);
