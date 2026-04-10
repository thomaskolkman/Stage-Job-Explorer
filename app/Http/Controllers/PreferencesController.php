<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
public function index()
{
    // Haal alle interesses op
    $interesses = Interesse::all();
    
    // Haal de huidige student op
    $student = auth()->user()->student;
    
    // Toon de view met alle opties
    return view('vacatures.students.preferences', compact('interesses', 'student'));
}

public function store(Request $request)
{
    // Sla de gekozen interesses op in de koppeltabel
    $student = auth()->user()->student;
    $student->interesses()->sync($request->interesse_ids);
    
    return redirect()->back()->with('success', 'Voorkeuren opgeslagen!');
}
}
