<x-app-layout>
    <div class="p-8 bg-opacity-50 text-white font-semibold h-32 text-4xl">
        <h1>Vacatures</h1>
    </div>
    <div class="mx-auto w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('vacatures.create') }}">Create Vacature</a> <!-- deze link gaat naar de create vacature pagina waar je een nieuwe vacature kunt aanmaken -->
                    <ul>
                        @foreach($vacatures as $vacature) <!--deze foreach loop gaat door alle vacatures heen die zijn opgehaald in de controller en toont de titel, beschrijving en het bedrijf van elke vacature in een lijstitem -->
                            <li>
                                <h2>{{ $vacature->title }}</h2>
                                <p>{{ $vacature->description }}</p>
                                <p>Bedrijf: {{ $vacature->bedrijf->name }}</p>
                                <a href="{{ route('vacatures.show', $vacature->id) }}">View Vacature</a> <!-- deze link gaat naar de show vacature pagina waar je de details van de vacature kunt zien -->
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
