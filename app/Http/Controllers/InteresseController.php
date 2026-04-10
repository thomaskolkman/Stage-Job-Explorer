<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use App\Models\StudentInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteresseController extends Controller
{
    public function create()
    {
        $interesses = Interesse::where('type', 'programmeertalen')->get();

        return view('interesses.select', compact('interesses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'interesses' => 'required|array',
        ]);

        $student = Auth::user()->student;
        if (!$student) {
            return redirect()->back()->withErrors(['error' => 'Student profile not found. Please complete your registration.']);
        }

        $studentId = $student->id;

        foreach ($request->interesses as $interesseId) {
            StudentInteresse::create([
                'student_id' => $studentId,
                'interesse_id' => $interesseId,
                'status' => 'interested',
                'applied_at' => now(),
            ]);
        }

        return redirect('/dashboard');
    }
}