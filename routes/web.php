<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\RegistrationValidator;
use App\Http\Middleware\ReverseRegistrationValidator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('register');})->middleware(ReverseRegistrationValidator::class);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/home', function () { return view('home');})->middleware(RegistrationValidator::class);
Route::get('/time', function () { return view('time');})->middleware(RegistrationValidator::class);
Route::get('/countdown', function () { return view('countdown');})->middleware(RegistrationValidator::class);
