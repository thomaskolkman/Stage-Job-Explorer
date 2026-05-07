<x-guest-layout>
    <form method="POST" action="{{ route('register.bedrijf') }}">
        @csrf

        <!-- Company Name -->
        <div>
            <x-input-label for="name" :value="__('Company Name')" />
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
            <x-input-label for="location" :value="__('Address')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <!-- Industry -->
        <div class="mt-4">
            <x-input-label for="industry" :value="__('Industry')" />
            <select id="industry" name="industry" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Select Industry --</option>
                <option value="Software Development" {{ old('industry') == 'Software Development' ? 'selected' : '' }}>Software Development</option>
                <option value="Hardware" {{ old('industry') == 'Hardware' ? 'selected' : '' }}>Hardware</option>
                <option value="Web Development" {{ old('industry') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                <option value="Cybersecurity" {{ old('industry') == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity</option>
                <option value="Artificial Intelligence" {{ old('industry') == 'Artificial Intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                <option value="E-commerce" {{ old('industry') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
            </select>
            <x-input-error :messages="$errors->get('industry')" class="mt-2" />
        </div>

        <!-- Website (optional) -->
        <div class="mt-4">  
            <x-input-label for="website" :value="__('Website (URL)')" />
            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" />
            <x-input-error :messages="$errors->get('website')" class="mt-2" />  
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login.bedrijf') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>