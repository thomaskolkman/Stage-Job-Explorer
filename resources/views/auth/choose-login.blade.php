<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col gap-4 w-full max-w-md p-4">

            <x-login-button href="{{ route('login') }}" label="Student Login" variant="primary" />

            <x-login-button href="#" label="Bedrijf Login" variant="secondary" />

            <div class="py-3 flex items-center text-sm text-white before:flex-1 before:border-t before:border-white before:me-6 after:flex-1 after:border-t after:border-white after:ms-6">
                Choose Login Type
            </div>
        
        </div>
        
    </form>
</x-guest-layout>
