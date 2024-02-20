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

        <link rel="stylesheet" href='{{ asset('bootstrap-5/css/bootstrap.min.css') }}'>
    </head>
    <body class="font-sans antialiased h-full">
        @include('admin.shared._navbar') 

        <div class="mt-6 container  ">
            <!-- Page Content -->
            <!-- flash info -->
            @if (session('success'))
                    <div class="alert alert-success alert-dismissible  fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @else 
                        @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
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
