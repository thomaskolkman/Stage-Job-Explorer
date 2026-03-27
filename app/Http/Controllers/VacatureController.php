<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacature;

class VacatureController extends Controller
{
    public function index()
    {
            $vacatures = Vacature::with('bedrijf')->get();
            return view('vacatures.index', compact('vacatures')); //haalt alles vacatures op en geeft zo door aan de view, compact is een functie die een array maakt van de variabelen die je meegeeft, in dit geval 'vacatures' => $vacatures zodat je in de view de variabele $vacatures kunt gebruiken om de vacatures te tonen
    }

    public function create()
    {
        return view('vacatures.create');
    }

    public function store(Request $request) //de request bevat alle ingevulde gegevens van het formulier die de gebruiker heeft ingevuld, deze gegevens worden vervolgens gevalideerd en opgeslagen in de database als een nieuwe vacature
    {
        $validatedData = $request->validate([ // controleer of de ingevoerde gegevens geldig zijn
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
            'bedrijf_id' => 'required|exists:bedrijven,id',
        ]);

        Vacature::create($validatedData);

        return redirect()->route('vacatures.index')->with('success', 'Vacature succesvol aangemaakt.');
    }
}
