<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <!-- ** Plugins Needed for the Project ** -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}">
        <!-- slick slider -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css') }}">
        <!-- themefy-icon -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/themify-icons/themify-icons.css') }}">
        <!-- animation css -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/animate/animate.css') }}">
        <!-- aos -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/aos/aos.css') }}">
        <!-- venobox popup -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/venobox/venobox.css') }}">

        <!-- Main Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        
        <!--Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    </head>
    <body class="">
        {{-- <div class="min-h-screen bg-gray-100"> --}}
            {{-- @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        {{-- </div> --}}

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jQuery/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <!-- slick slider -->
        <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
        <!-- aos -->
        <script src="{{ asset('assets/plugins/aos/aos.js') }}"></script>
        <!-- venobox popup -->
        <script src="{{ asset('assets/plugins/venobox/venobox.min.js') }}"></script>
        <!-- mixitup filter -->
        <script src="{{ asset('assets/plugins/mixitup/mixitup.min.js') }}"></script>
        <!-- google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
        <script src="{{ asset('assets/plugins/google-map/gmap.js') }}"></script>

        <!-- Main Script -->
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </body>
</html>
