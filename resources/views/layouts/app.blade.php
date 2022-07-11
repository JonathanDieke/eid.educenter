<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }}</title>

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
        {{-- FontAwesome --}}
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


        <!-- Main Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        <!--Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        @stack('styles')

        @livewireStyles



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
                            <a class="text-color mr-3" href="callto:+2250153488836"><strong>Contact</strong> +225 01 XX XX XX </a>
                            <ul class="list-inline d-inline">
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
                                <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        @guest
                            <div class="col-lg-8 text-center text-lg-right ">
                                <ul class="list-inline">
                                    {{-- <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
                                    <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
                                    <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li> --}}
                                    <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#loginModal">Connexion</a></li>
                                    <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#signupModal" >Inscription</a></li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- navbar -->
            <div class="navigation w-100">
                <div class="container ">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand font-weight-bold text-primary text-center" href="{{ route('welcome') }}">
                        RUSSEDUC
                        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo"> --}}
                    </a>
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
                                    <a class="nav-link" href="{{ route('news') }}">Actualités</a>
                                </li>
                                <li class="nav-item @@courses">
                                    <a class="nav-link" href="{{ route('donations') }}">Donations</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('myportal') }}">Mon compte </a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('shortcut') }}">Accès rapide</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('futures-student') }}">Futurs Etudiants</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('current-student') }}">Etudiants Actuels</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('universities') }}">Universités</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('programs') }}">Programme d'études</a>
                                </li>
                                <li class="nav-item @@events">
                                    <a class="nav-link" href="{{ route('faculte') }}">Facultés </a>
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
                                        <a class="dropdown-item {{ set_active_route(['studies.profile']) }}" href="{{ route('studies.profile') }}">Mon profil étudiant</a>
                                        <a class="dropdown-item {{ set_active_route(['studies.admission']) }}" href="{{ route('studies.admission') }}">Mes admissions</a>
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

        @if(!Auth::user())
            <!-- Modal Register -->
            <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self  wire:click="setForm('registerForm')">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0 border-0 p-4">
                        <div class="modal-header border-0">
                            <h3>Inscription</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="hideModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{-- @foreach ($errors->all() as $message )
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endforeach --}}
                        <div class="modal-body">
                            <div>
                                <form  class="row" wire:submit.prevent="register" autocomplete="off" id="registerForm">
                                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                    <div class="pl-2 w-100 ">
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-6">
                                                @error('register.name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input type="text" class="form-control form-control-sm " wire:model.lazy="register.name"  placeholder="Nom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                @error('register.lname') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input type="text" class="form-control form-control-sm " wire:model.lazy="register.lname" placeholder="Prénoms" autocomplete="off ">
                                            </div>
                                        </div>
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-12">
                                                @error('register.gender') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model.lazy="register.gender">
                                                    <option selected>Genre</option>
                                                    <option value="male" >Masculin</option>
                                                    <option value="female" >Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-6">
                                                @error('register.birthdate') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input  class="form-control form-control-sm" name="birthdate" wire:model.lazy="register.birthdate" placeholder="Date d'anniversaire" autocomplete="off "  id="datepicker" onchange="Livewire.emit('getDate', this.value)">
                                            </div>
                                            <div class="form-group col-md-6">
                                                @error('register.country') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model="register.country"'>
                                                    <option selected>Pays de naissance</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-6">
                                                @error('register.state') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model="register.state" >
                                                    <option selected>Etat de naissance</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}" >{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                @error('register.city') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model="register.city" >
                                                    <option selected>Ville de naissance</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-6">
                                                @error('register.native_language') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model.lazy="register.native_language">
                                                    <option selected>Langue maternelle</option>
                                                    <option value="french" >Français</option>
                                                    <option value="english" >Anglais</option>
                                                    <option value="spanish" >Espagnol</option>
                                                    <option value="russian" >Russe</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                @error('register.use_language') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <select class="custom-select " wire:model.lazy="register.use_language">
                                                    <option selected>Langue d'usage</option>
                                                    <option value="french" >Français</option>
                                                    <option value="english" >Anglais</option>
                                                    <option value="spanish" >Espagnol</option>
                                                    <option value="russian" >Russe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-12">
                                                @error('register.email') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input type="email" class="form-control form-control-sm " wire:model.lazy="register.email" placeholder="Email" autocomplete="off ">
                                            </div>
                                        </div>
                                        <div class="form-row  pl-2 w-100">
                                            <div class="form-group col-md-6">
                                                @error('register.password') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input type="password" class="form-control form-control-sm " wire:model.lazy="register.password"  placeholder="Mot de passe">
                                            </div>
                                            <div class="form-group col-md-6">
                                                @error('register.password_confirmation') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                                <input type="password" class="form-control form-control-sm " wire:model.lazy="register.password_confirmation"  placeholder="Confirmer le mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary tbn-sm">S'enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Register -->

            <!-- Modal Login -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"  wire:ignore.self  wire:click="setForm('loginForm')">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0 border-0 p-4">
                        <div class="modal-header border-0">
                            <h3>Connexion</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="hideModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="login" class="row" autocomplete="off">
                                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                <div class="col-12">
                                    @error('email') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                    <input type="email" class="form-control form-control-sm mb-3" wire:model.lazy="email" placeholder="Email" autocomplete="off">
                                </div>
                                <div class="col-12">
                                    @error('password') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                    <input type="password" class="form-control form-control-sm mb-3" wire:model.lazy="password" placeholder="Mot de passe"  autocomplete="off">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary tbn-sm">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Login -->
        @endif


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- footer -->
        <footer>
            {{ $footer ?? "" }}

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
                                Developped with &hearts; by EID (<a href="https://linkedin.com/"> LinkedIn </a>)
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
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
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
        {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

        @livewireScripts

        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        @stack('scripts')
        <script>
            // if($("footer").offset().top < window.innerHeight){
            //     $('footer').addClass('fixed-bottom')
            // }
        </script>
        <script>
            window.addEventListener('closeModal', () => {
                console.log("close modal event")
                $('.modal').modal('hide');
            })

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                format : "yyyy-mm-dd",
            });

            $('.formation_period').datepicker({
                uiLibrary: 'bootstrap4',
                format : "yyyy-mm",
                autoclose: true,
                todayHighlight: true,
            });
        </script>
    </body>
</html>
