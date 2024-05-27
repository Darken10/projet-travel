<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        @php
            $choix = [
                'numero'=>'Numero',
                'email'=>'Email',
            ]
        @endphp
       
        <div class=" flex gap-2">
            <x-admin.select id="choix" class="w-44" :w_full='False' label="Choix" name="choix" :options="$choix" :value="old('choix')" />
            <x-admin.input id="input" class="w-full" label="Email admin input" name="email" type="email" :value="old('email')" required autofocus autocomplete="email" />
        </div>

        {{--<div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="number" :value="__('Numero de Telephone')" />
            <x-text-input id="number" class="block mt-1 w-full" type="tel" name="number" :value="old('number')" required autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>--}}

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
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenire de moi') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-1">
            <a href="#" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('S\'inscire') }}
            </a>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublier?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Connecter') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        const choix = document.querySelector('#choix')
        const input = document.querySelector('#input input')
        const label = document.querySelector('#input label')

        label.value = "Numero de Telephone"
        input.setAttribute('type','tel')
        input.setAttribute('name','number')
        input.setAttribute('placeholder','70707070')
        input.setAttribute('id','number')
        
        choix.addEventListener('change',()=>{
            switch (choix.value) {
                case 'numero':
                    label.value = "Numero de Telephone"
                    input.setAttribute('type','tel')
                    input.setAttribute('name','number')
                    input.setAttribute('placeholder','70707070')
                    input.setAttribute('id','number')
                    break;
                case 'email':
                    label.value = "Adresse mail"
                    input.setAttribute('type','email')
                    input.setAttribute('name','email')
                    input.setAttribute('placeholder','exemple@gmail.com')
                    input.setAttribute('id','email')
                    
                    break;
            
                default:
                    label.value = "Numero de Telephone"
                    input.setAttribute('type','number')
                    input.setAttribute('name','number')
                    input.setAttribute('placeholder','123456789')
                    input.setAttribute('id','number')
                    break;
            }
        })
        

        
    </script>

</x-guest-layout>
