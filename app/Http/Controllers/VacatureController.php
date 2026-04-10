<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacature;
use App\Models\Bedrijf;

class VacatureController extends Controller
{
    public function index()
    {
            $vacatures = Vacature::with('bedrijf')->get();
            return view('vacatures.index', compact('vacatures')); //haalt alles vacatures op en geeft zo door aan de view, compact is een functie die een array maakt van de variabelen die je meegeeft, in dit geval 'vacatures' => $vacatures zodat je in de view de variabele $vacatures kunt gebruiken om de vacatures te tonen
    }

    public function create() // deze functie toont het formulier om een nieuwe vacature aan te maken, wanneer de gebruiker naar de route /vacatures/create gaat, wordt deze functie aangeroepen en wordt de view vacatures.create geretourneerd, deze view bevat het formulier voor het aanmaken van een nieuwe vacature
    {
        $bedrijven = Bedrijf::all(); // haalt alle bedrijven op uit de database

        return view('vacatures.create', compact('bedrijven'));
    }

    public function show($id) // deze functie toont de details van een specifieke vacature, wanneer de gebruiker naar de route /vacatures/{id} gaat, wordt deze functie aangeroepen en wordt de view vacatures.show geretourneerd, deze view bevat de details van de vacature met het opgegeven id
    {
        $vacature = Vacature::with('bedrijf')->findOrFail($id); // haalt de vacature op met het opgegeven id, als er geen vacature wordt gevonden, wordt er een 404 foutmelding weergegeven

        return view('vacatures.show', compact('vacature'));
    }

    public function store(Request $request) //de request bevat alle ingevulde gegevens van het formulier die de gebruiker heeft ingevuld, deze gegevens worden vervolgens gevalideerd en opgeslagen in de database als een nieuwe vacature
    {
        $validatedData = $request->validate([ // controleer of de ingevoerde gegevens geldig zijn
              'title' => 'required|string|max:255',
              'description' => 'required|string',
              'location' => 'required|string|max:255',
              'bedrijf_id' => 'required|exists:bedrijven,id',
            'spots_available' => 'required|integer|min:1',
            'start_date' => 'required|date',
        ]);

        Vacature::create($validatedData);

        return redirect()->route('vacatures.index')->with('success', 'Vacature succesvol aangemaakt.');
    }
}
