<x-app-layout>
    <div class="p-8 bg-opacity-50 text-white font-semibold h-32 text-4xl">
        <h1>Show Vacature</h1>
    </div>
    <div class="mx-auto w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Title: {{ $vacature->title }}</p>
                    <p>Description: {{ $vacature->description }}</p>
                    <p>Start Date: {{ $vacature->start_date }}</p>
                    <p>Spots Available: {{ $vacature->spots_available }}</p>
                    <p>Company: {{ $vacature->bedrijf->name }}</p>
                    <p>Location: {{ $vacature->location }}</p>
                    <a href="{{ route('vacatures.index') }}">Back to Vacatures</a> <!-- deze link gaat terug naar de vacatures index pagina waar je alle vacatures kunt zien -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
