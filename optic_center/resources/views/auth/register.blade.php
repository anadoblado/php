<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
                <!-- Apellidos -->
                <div>
                    <x-label for="apells" :value="__('Apells')" />

                    <x-input id="apells" class="block mt-1 w-full" type="text" name="apells" :value="old('apells')" required autofocus />
                </div>

                <!-- Dni -->
                <div>
                    <x-label for="dni" :value="__('Dni')" />

                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
                </div>
                <!-- Address -->
                <div>
                    <x-label for="address" :value="__('Address')" />

                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
                </div>

                <!-- Cp -->
                <div>
                    <x-label for="cp" :value="__('Cp')" />

                    <x-input id="cp" class="block mt-1 w-full" type="number" name="cp" :value="old('cp')" required autofocus />
                </div>

                <!-- City -->
                <div>
                    <x-label for="city" :value="__('City')" />

                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
