<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'number' =>["numeric",'required','unique:users,number'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:70'],
            'cnib_recto_url' => ['required', 'string', 'max:100'],
            'cnib_verso_url' => ['required', 'string', 'max:100'],
            'type_document' => ['required', 'string', 'max:50'],

        ]);
        
        
        $user = User::create([
            'name' => strtoupper($request->first_name) .' '.$request->last_name,
            'email' => $request->email,
            'number' => (string)$request->number,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'cnib_recto_url' => $request->cnib_recto_url,
            'cnib_verso_url' => $request->cnib_verso_url,
            'type_document' => $request->type_document,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
