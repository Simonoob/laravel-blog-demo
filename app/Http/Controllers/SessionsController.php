<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(): RedirectResponse{
        auth()->logout();
       return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(): View|Factory {
        return view('sessions.create');
    }

    public function store(): RedirectResponse {
        $attributes = request()->validate([
            'email' =>['required', 'email'],
            'password' => 'required'
        ]);

        // attempt to auth the user with the credelntials
        if(!auth()->attempt($attributes)) {
        throw ValidationException::withMessages(['loginError' => 'Login failed: Your provided credentials could not be verified.']);
        }


            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back!');
    }
}
