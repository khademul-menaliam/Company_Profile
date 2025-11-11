<x-guest-layout>

            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Confirm Your Password</h2>
            <p class="text-gray-500 mb-6 text-center">Please confirm your password before continuing.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <x-primary-button class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                    {{ __('Confirm') }}
                </x-primary-button>
            </form>

</x-guest-layout>
