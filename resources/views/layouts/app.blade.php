<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduCenter') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
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

        @stack('styles')

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    </head>
    <body class="">

        <!-- header -->
        <header class="header {{ Route::Is('welcome') ? 'fixed-top' : '' }} {{ Auth::user() ? 'nav-bg' : '' }} ">
            <!-- top header -->
            <div class="top-header py-2 bg-white">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-4 text-center text-lg-left">
                            <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
                            <ul class="list-inline d-inline">
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 text-center text-lg-right">
                            <ul class="list-inline">
                                {{-- <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
                                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
                                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li> --}}
                                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#loginModal">Connexion</a></li>
                                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#signupModal" >Inscription</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- navbar -->
            <div class="navigation w-100">
                <div class="container ">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto text-center">
                            @guest
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('welcome') }}">Accueil</a>
                                </li>
                                <li class="nav-item @@about">
                                    <a class="nav-link" href="about.html">Actualtés</a>
                                </li>
                                <li class="nav-item @@courses">
                                    <a class="nav-link" href="courses.html">Donations</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="events.html">Accès rapide</a>
                                </li>

                            @else
                                <li class="nav-item {{ set_active_route(['user.dashboard']) }}">
                                    <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item dropdown view {{ set_active_route(['admission.profile', 'studies.admission']) }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                        Etudes
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('studies.profile') }}">Mon profil étudiant</a>
                                        <a class="dropdown-item" href="{{ route('studies.admission') }}">Mes admissions</a>
                                    </div>
                                </li>
                                <li class="nav-item  {{ set_active_route(['user.translate_legalize']) }}">
                                    <a class="nav-link" href="{{ route('user.translate_legalize') }}">Traductions et légalisations</a>
                                </li>
                                <li class="nav-item dropdown view">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        document.querySelector('#logoutForm').closest('form').submit();">Déconnexion</a>

                                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            {{-- <li class="nav-item dropdown view">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="teacher.html">Teacher</a>
                                    <a class="dropdown-item" href="teacher-single.html">Teacher Single</a>
                                    <a class="dropdown-item" href="notice.html">Notice</a>
                                    <a class="dropdown-item" href="notice-single.html">Notice Details</a>
                                    <a class="dropdown-item" href="research.html">Research</a>
                                    <a class="dropdown-item" href="scholarship.html">Scholarship</a>
                                    <a class="dropdown-item" href="course-single.html">Course Details</a>
                                    <a class="dropdown-item" href="event-single.html">Event Details</a>
                                    <a class="dropdown-item" href="blog-single.html">Blog Details</a>
                                </div>
                            </li> --}}
                            {{-- <li class="nav-item @@contact">
                                <a class="nav-link" href="contact.html">CONTACT</a>
                            </li> --}}
                        </ul>
                    </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- footer -->
        <footer>
            {{ $footer }}

            <!-- copyright -->
            <div class="copyright py-4 bg-footer">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-7 text-sm-left text-center">
                        <p class="mb-0">© Copyright 2022-
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                                </script>
                            </p>
                            {{ env('APP_NAME') }} All Rights Reserved.
                            <p>
                                Developped with &hearts; by Jonathan Dieke (<a href="https://linkedin.com/JonathanDieke"> LinkedIn </a>)
                            </p>
                        </div>
                    <div class="col-sm-5 text-sm-right text-center">
                        <ul class="list-inline">
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-facebook text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-twitter-alt text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-instagram text-primary"></i></a></li>
                        <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-dribbble text-primary"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /footer -->

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

        <!-- Alpine v3 -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @livewireScripts
    </body>
</html>
