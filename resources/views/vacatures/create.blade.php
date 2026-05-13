<x-app-layout>
    <div class="p-8 bg-opacity-50 text-white font-semibold h-32 text-4xl">
        <h1>Create Vacature</h1>
    </div>
    <div class="mx-auto w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('vacatures.index') }}">Back to Vacatures</a>

                    <form action="{{ route('vacatures.store') }}" method="POST">
                        @csrf
                        <div>
                            <div>
                                <label for="start_date">Startdatum:</label>
                                <input type="date" id="start_date" name="start_date" required>
                            </div>
                            <div>
                                <label for="spots_available">Aantal plekken beschikbaar:</label>
                                <input type="number" id="spots_available" name="spots_available" min="1" required>
                            </div>
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div>
                            <label for="bedrijf_id">Bedrijf:</label>
                            <select id="bedrijf_id" name="bedrijf_id" required>
                                @foreach($bedrijven as $bedrijf)
                                    <option value="{{ $bedrijf->id }}">{{ $bedrijf->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="location">Location:</label>
                            <input type="text" id="location" name="location" required>
                        </div>

                        <button type="submit">Create Vacature</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
