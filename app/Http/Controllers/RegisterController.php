<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    public function create(): View|Factory
    {
        return view('register.create');
    }

    public function store(): Redirector|RedirectResponse {
        //create the user
        $attributes = request()->validate([
            'name' =>['required', 'max:255', 'min:3'],
            'username' =>['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' =>['required', 'email', 'max:255', 'unique:users,email'],
            'password' =>['required', 'min:7', 'max:255'],
        ]);

        $user = User::create($attributes);

        // sign in the user
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
