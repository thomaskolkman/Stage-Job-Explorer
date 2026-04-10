<x-guest-layout>
    <div class="p-6">
        <h2 class="text-xl font-semibold text-white mb-4">
            Kies je programmeertalen
        </h2>

        <form method="POST" action="{{ route('interesses.store') }}">
            @csrf

            <div class="space-y-2">
                @foreach($interesses as $interesse)
                    <label class="flex items-center space-x-2 text-white">
                        <input type="checkbox" name="interesses[]" value="{{ $interesse->id }}">
                        <span>{{ $interesse->name }}</span>
                    </label>
                @endforeach
            </div>

            <button type="submit"
                class="mt-4 px-4 py-2 bg-indigo-600 rounded-lg text-white hover:bg-indigo-700">
                Opslaan
            </button>
        </form>
    </div>
</x-guest-layout>