<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Preference;
use Illuminate\Http\Request;

class StudentController extends Controller
{
        public function index()
        {
            $students = Student::all(); // haalt alle studenten op uit de database

            return view('students.index', compact('students')); // geeft de studenten door aan de view
        }
    
        public function create()
        {
            // Logica om het formulier voor het aanmaken van een nieuwe student weer te geven
        }
    
        public function store(Request $request)
        {
            // Logica om een nieuwe student op te slaan in de database
        }
    
        public function show($id)
        {
            // Logica om de details van een specifieke student weer te geven
        }
    
        public function edit($id)
        {
            // Logica om het formulier voor het bewerken van een bestaande student weer te geven
        }
    
        public function update(Request $request, $id)
        {
            // Logica om de gegevens van een bestaande student bij te werken in de database
        }
    
        public function destroy($id)
        {
            // Logica om een bestaande student te verwijderen uit de database
        }

        public function preferences()
        {
            // Logica om de voorkeuren van een student weer te geven
        }

        public function updatePreferences(Request $request)
        {
            // Logica om de voorkeuren van een student bij te werken in de database
        }

        public function showPreferences()
        {
            // Logica om de voorkeuren van een student weer te geven
        }

        public function editPreferences()
        {
            // Logica om het formulier voor het bewerken van de voorkeuren van een student weer te geven
        }
}
