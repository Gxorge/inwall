<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Terminal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegistrationController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        // Validate user input, check for required values
        // and sanitise the input
        $credentials = $request->validate([
            'secret' => 'required',
        ]);

        $registration = Registration::where('secret', '=', $credentials['secret'])->first();
        if (!$registration) { // If not reject.
            return back()->withErrors(['secret' => 'Invalid registration secret.']);
        }

        if (!$registration->allow_new_terminals) {
            return back()->withErrors(['secret' => 'This site is not allowing new registrations.']);
        }

        $terminal = new Terminal;
        $terminal->name = "Unset";
        $terminal->location = "Site #" . $registration->rid;
        $terminal->site_id = $registration->rid;
        $terminal->save();
        $terminal->name = "Site #" . $registration->rid . " Terminal #" . $terminal->tid;
        $terminal->update();

        $request->session()->regenerate();
        $request->session()->put('rid', $registration->rid);
        $request->session()->put('tid', $terminal->tid);
        return redirect('/home');
    }
}
