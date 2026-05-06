<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Bedrijf;
use Spatie\Permission\Models\Role;

class RegisteredBedrijfController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register-bedrijf');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Opties voor dropdowns
        $companyOptions = [
            'Software Development',
            'Hardware',
            'Web Development',
            'Cybersecurity',   
            'Artificial Intelligence',
            'E-commerce',
        ];

        // Validatie inclusief extra velden voor bedrijf
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'location' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'in:' . implode(',', $companyOptions)],
            'website' => ['nullable', 'string', 'max:255'],
        ]);

        // Maak de gebruiker aan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Maak het bijbehorende bedrijf record
        Bedrijf::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'industry' => $request->industry,
            'website' => $request->website,
        ]);

        // Zorg dat de rol 'bedrijf' bestaat en ken deze toe
        Role::firstOrCreate(['name' => 'bedrijf']);
        $user->assignRole('bedrijf');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('bedrijven.interesses.create', absolute: false));
        
    }
}