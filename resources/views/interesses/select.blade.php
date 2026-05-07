<x-guest-layout>
    <div class="p-6">
        <h2 class="text-xl font-semibold text-white mb-4">
            Kies je {{ $typeLabels[$type] ?? ucfirst($type) }}
        </h2>

        <form method="POST" action="{{ route('interesses.store', ['type' => $type]) }}">
            @csrf

            <div class="space-y-2">
                @forelse($interesses as $interesse)
                    <label class="flex items-center space-x-2 text-white">
                        <input type="checkbox" name="interesses[]" value="{{ $interesse->id }}"
                            {{ in_array($interesse->id, $selectedInteresses ?? []) ? 'checked' : '' }}>
                        <span>{{ $interesse->name }}</span>
                    </label>
                @empty
                    <p class="text-slate-200">Er zijn op dit moment geen interesses voor deze categorie.</p>
                @endforelse
            </div>

            @error('interesses')
                <p class="mt-3 text-sm text-red-500">{{ $message }}</p>
            @enderror

            <div class="mt-6 flex items-center justify-between gap-3">
                @if($type !== $types[0])
                    @php
                        $previousType = $types[array_search($type, $types, true) - 1];
                    @endphp
                    <a href="{{ route('interesses.create', ['type' => $previousType]) }}"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-white hover:bg-slate-700">
                        Vorige
                    </a>
                @else
                    <span></span>
                @endif

                <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700">
                    {{ $type === $types[count($types) - 1] ? 'Voltooien' : 'Volgende' }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>