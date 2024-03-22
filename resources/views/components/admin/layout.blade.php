<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " class="h-full">
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

{{-- <linkrel="stylesheet"href='asset('bootstrap-5/css/bootstrap.min.css') '>--}}
    </head>
    <body class="font-sans antialiased h-full">
        
        @include('admin.shared._navbar') 

        <div class="mt-6 container  ">
            <!-- Page Content -->
            <!-- flash info -->
            @if (session('success'))
                    <x-alert type="success">{{ session('success') }}</x-alert>
                @else
                    @if (session('error'))
                            <x-alert type="error"> {{ session('error') }}</x-alert>
                    @else 
                        @if (session('warning'))
                        <x-alert type="warning"> {{ session('warning') }} </x-alert>
                        
                        @endif
                    @endif
                @endif
            <!-- fin flash info -->

            <main >
                {{ $slot }}
            </main>
        </div>

        @include('admin.shared._footer')
        <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
    </body>
</html>
