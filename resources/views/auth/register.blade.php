<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Study -->
        <div class="mt-4">
            <x-input-label for="study" :value="__('Study')" />
            <select id="study" name="study" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Select Study --</option>
                <option value="Software Development" {{ old('study') == 'Software Development' ? 'selected' : '' }}>Software Development</option>
                <option value="ICT System Engineer" {{ old('study') == 'ICT System Engineer' ? 'selected' : '' }}>ICT System Engineer</option>
                <option value="ICT Support Technician" {{ old('study') == 'ICT Support Technician' ? 'selected' : '' }}>ICT Support Technician</option>
                <option value="Medewerker ICT" {{ old('study') == 'Medewerker ICT' ? 'selected' : '' }}>Medewerker ICT</option>
            </select>
            <x-input-error :messages="$errors->get('study')" class="mt-2" />
        </div>

        <!-- Study Year -->
        <div class="mt-4">
            <x-input-label for="study_year" :value="__('Study Year')" />
            <select id="study_year" name="study_year" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Select Year --</option>
                <option value="First Year" {{ old('study_year') == 'First Year' ? 'selected' : '' }}>First Year</option>
                <option value="Second Year" {{ old('study_year') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                <option value="Third Year" {{ old('study_year') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                <option value="Fourth Year" {{ old('study_year') == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
            </select>
            <x-input-error :messages="$errors->get('study_year')" class="mt-2" />
        </div>

        <!-- CV (optional) -->
        <div class="mt-4">
            <x-input-label for="cv" :value="__('CV (URL)')" />
            <x-text-input id="cv" class="block mt-1 w-full" type="text" name="cv" :value="old('cv')" />
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>