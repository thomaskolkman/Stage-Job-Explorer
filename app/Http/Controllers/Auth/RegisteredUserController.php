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
use Spatie\Permission\Models\Role;

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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Opties voor dropdowns
        $studyOptions = [
            'Software Development',
            'ICT System Engineer',
            'ICT Support Technician',
            'Medewerker ICT',
        ];

        $studyYearOptions = [
            'First Year',
            'Second Year',
            'Third Year',
            'Fourth Year',
        ];

        // Validatie inclusief extra velden voor studenten
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'ends_with:@student.alfa-college.nl',
                'unique:' . User::class,
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'study' => ['required', 'string', 'in:' . implode(',', $studyOptions)],
            'cv' => ['nullable', 'string', 'max:255'],
            'study_year' => ['required', 'string', 'in:' . implode(',', $studyYearOptions)],
        ]);

        // Maak de gebruiker aan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Maak het bijbehorende student record
        Student::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'address' => $request->address,
            'study' => $request->study,
            'cv' => $request->cv,
            'study_year' => $request->study_year,
        ]);

        // Zorg dat de rol 'student' bestaat en ken deze toe
        Role::firstOrCreate(['name' => 'student']);
        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}