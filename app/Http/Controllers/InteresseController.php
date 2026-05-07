<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use App\Models\StudentInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteresseController extends Controller
{
    private array $types = [
        'programmeertalen',
        'softskills',
        'stagevoorkeuren',
        'stageperiode',
    ];

    private array $typeLabels = [
        'programmeertalen' => 'Programmeertalen',
        'softskills' => 'Softskills',
        'stagevoorkeuren' => 'Stagevoorkeuren',
        'stageperiode' => 'Stageperiode',
    ];

    public function create(string $type = null)
    {
        if (!$type) {
            return redirect()->route('interesses.create', ['type' => $this->types[0]]);
        }

        if (!in_array($type, $this->types, true)) {
            abort(404);
        }

        $interesses = Interesse::where('type', $type)->get();
        $selectedInteresses = session("interesse_wizard.{$type}", []);

        return view('interesses.select', [
            'interesses' => $interesses,
            'type' => $type,
            'types' => $this->types,
            'typeLabels' => $this->typeLabels,
            'selectedInteresses' => $selectedInteresses,
        ]);
    }

    public function store(Request $request, string $type = null)
    {
        if (!$type) {
            return redirect()->route('interesses.create', ['type' => $this->types[0]]);
        }

        if (!in_array($type, $this->types, true)) {
            abort(404);
        }

        $request->validate([
            'interesses' => 'required|array|min:1',
        ]);

        session()->put("interesse_wizard.{$type}", $request->input('interesses', []));

        $currentIndex = array_search($type, $this->types, true);
        $nextIndex = $currentIndex + 1;

        if ($nextIndex < count($this->types)) {
            return redirect()->route('interesses.create', ['type' => $this->types[$nextIndex]]);
        }

        $student = Auth::user()->student;
        if (!$student) {
            return redirect()->back()->withErrors(['error' => 'Student profile not found. Please complete your registration.']);
        }

        $interesseIds = collect(session('interesse_wizard', []))
            ->flatten()
            ->unique()
            ->filter()
            ->values()
            ->all();

        if (empty($interesseIds)) {
            return redirect()->back()->withErrors(['interesses' => 'Selecteer minstens één interesse.']);
        }

        StudentInteresse::where('student_id', $student->id)->delete();

        foreach ($interesseIds as $interesseId) {
            StudentInteresse::create([
                'student_id' => $student->id,
                'interesse_id' => $interesseId,
                'status' => 'interested',
                'applied_at' => now(),
            ]);
        }

        session()->forget('interesse_wizard');

        return redirect('/dashboard');
    }
}