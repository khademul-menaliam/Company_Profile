<x-guest-layout>
    <div class="text-center mb-8">
        <h5 class="font-bold text-gray-800">AR ENGINEERING</h5>
        <h1 class="text-3xl font-bold text-gray-800">Welcome Back 👋</h1>
        <p class="text-gray-500 mt-2">Sign in to your account to continue</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                type="email" name="email" :value="old('email')" placeholder="you@example.com" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                type="password" name="password" placeholder="••••••••" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition ease-in-out duration-150">
            {{ __('Sign In') }}
        </x-primary-button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
            {{ __('Sign up here') }}
        </a>
    </p>
</x-guest-layout>
