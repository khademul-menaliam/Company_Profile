<x-guest-layout>
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Forgot Password?</h2>
            <p class="text-gray-500 mb-6 text-center">
                Enter your email and we’ll send you a password reset link.
            </p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="you@example.com" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <x-primary-button class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                    {{ __('Send Reset Link') }}
                </x-primary-button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Back to login</a>
            </p>
</x-guest-layout>
