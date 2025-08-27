{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<x-guest-layout>
    <div class="mx-auto max-w-2xl p-6 w-full">
        <div class="mx-auto max-w-md">
            <h1 class="text-2xl font-semibold tracking-tight">Welcome back</h1>
            <p class="mt-1 text-sm text-gray-500">Sign in to continue</p>

            @if (session('status'))
                <div class="mt-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{route('login')}}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
                                href="{{ route('password.request') }}">Forgot?</a>
                        @endif
                    </div>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        Remember me
                    </label>
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Sign in
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                New here?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Create an
                    account</a>
            </p>
        </div>
    </div>
</x-guest-layout>
