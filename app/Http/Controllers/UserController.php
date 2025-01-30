<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Authenticates a user from their login POST request.
     * Must contain the following string values:
     * - 'email'
     * - 'password'
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'pin' => 'required|integer',
        ]);

        $hashedPin = Hash::make($credentials['pin']);
        $user = User::where('pin', '=', $hashedPin)->first();
        if (!$user) { // If not reject.
            return back()->withErrors(['login' => 'Invalid pin'])->withInput();
        }

        $request->session()->regenerate();
        $request->session()->put('uid', $user->uid);
        return redirect('/account');
    }
}
