<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First_name -->
        <div>
            <x-input-label for="first_name" :value="__('Nom ')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last_ame -->
        <div>
            <x-input-label for="last_name" :value="__('Prenom')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Type document -->
        <div>
            <x-input-label for="type_document" :value="__('Type du document')" />
            <x-text-input id="type_document" class="block mt-1 w-full" type="text" name="type_document" :value="old('type_document')" required autofocus autocomplete="type_document" />
            <x-input-error :messages="$errors->get('type_document')" class="mt-2" />
        </div>

        <!-- Document recto -->
        <div>
            <x-input-label for="cnib_recto_url" :value="__('cnib_recto_url')" />
            <x-text-input id="cnib_recto_url" class="block mt-1 w-full" type="text" name="cnib_recto_url" :value="old('cnib_recto_url')" required autofocus autocomplete="cnib_recto_url" />
            <x-input-error :messages="$errors->get('cnib_recto_url')" class="mt-2" />
        </div>

        <!-- Document verso -->
        <div>
            <x-input-label for="cnib_verso_url" :value="__('cnib_verso_url')" />
            <x-text-input id="cnib_verso_url" class="block mt-1 w-full" type="text" name="cnib_verso_url" :value="old('cnib_verso_url')" required autofocus autocomplete="cnib_verso_url" />
            <x-input-error :messages="$errors->get('cnib_verso_url')" class="mt-2" />
        </div>

        <!-- Numero -->
        <div>
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="tel" name="number" :value="old('number')" required autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
