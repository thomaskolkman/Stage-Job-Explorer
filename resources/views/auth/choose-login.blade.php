<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col gap-4 w-full max-w-md p-4">

            <x-login-button href="{{ route('register') }}" label="Student Login" variant="primary" />

            <x-login-button href="#" label="Bedrijf Login" variant="secondary" />

            <div class="py-3 flex items-center text-sm text-indigo-800 before:flex-1 before:border-t before:border-indigo-800 before:me-6 after:flex-1 after:border-t after:border-indigo-800 after:ms-6">
                Choose Login Type
            </div>
        
        </div>
        
    </form>
</x-guest-layout>
