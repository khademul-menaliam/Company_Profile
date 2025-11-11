<x-guest-layout>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Verify Your Email</h2>
            <p class="text-gray-500 mb-6">
                Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed you.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-green-600 font-medium">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="text-sm text-gray-600 hover:text-gray-800 underline">
                    {{ __('Log Out') }}
                </button>
            </form>
</x-guest-layout>
