<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased bg-gray-100"  >
        @include('shared._navbar')

        <div class=" container px-6">
            <!-- Page Content -->
            <!-- flash info -->
            @if (session('success'))
                        
                        <x-alert-success>{{ session('success') }}</x-alert-success>
                @else
                    @if (session('error'))
                    
                        <x-alert-error>{{ session('error') }}</x-alert-error>
                        
                    @endif
                @endif
            <!-- fin flash info -->

            <main class="mt-24" >

                {{ $slot }}
            </main>

            {{-- <x-shared.chat-support/> --}}
        </div>

        @include('shared._footer')
    </body>
</html>
