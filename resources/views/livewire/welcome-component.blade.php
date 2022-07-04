<div>

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
                                <div class="form-row  pl-2 w-100">
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
                                </div>
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
                                <button type="submit" class="btn btn-primary">S'enregistrer</button>
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
                           <button type="submit" class="btn btn-primary">Se connecter</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal Login -->

   <!-- hero slider -->
   <section class="hero-section overlay bg-cover" data-background="{{ asset('assets/images/banner/banner-1.jpg') }}">
       <div class="container">
            <div class="hero-slider">
                <!-- slider item -->
                <div class="hero-slider-item">
                        <div class="row">
                            <div class="col-md-8">
                            <h2 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Bienvenue sur {{ env('APP_NAME') }}</h2>
                            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">
                                La plateforme qui vous permet de partir étudier à l'étranger
                            </p>
                            <a href="#" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".99" data-toggle="modal" data-target="#signupModal">Inscrivez-vous</a>
                            </div>
                        </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                        <div class="row">
                            <div class="col-md-8">
                            <h2 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Votre réussite est notre mission</h2>
                            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">
                                Confiez nous votre projet d'études et mettez toutes les chances de votre côté pour atteindre vos objectifs
                            </p>
                            <a href="#" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".99" data-toggle="modal" data-target="#signupModal">Inscrivez-vous</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
   <!-- /hero slider -->

   <!-- banner-feature -->
   <section class="bg-gray">
       <div class="container-fluid p-0">
       <div class="row no-gutters">
           <div class="col-xl-4 col-lg-5 align-self-end">
                <img class="img-fluid w-100" src="{{ asset('assets/images/banner/banner-feature.png') }}" alt="banner-feature">
           </div>
           <div class="col-xl-8 col-lg-7">
           <div class="row feature-blocks bg-gray justify-content-between">
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Demande d'admission</h3>
               <p>
                    Confiez nous votre projet d'études !
                    Nous nous chargeons de soumettre vos demandes d'admission dans les meilleures universités russes
                    et mettons toutes les chances de votre côté pour obtenir une acceptation
                </p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Assistance pour le Visa</h3>
               <p>
                    Vous êtes admis dans un université russe ?
                    Nous proposons un service d'assistance personnalisée pour l'obtention de votre visa.
                    Cette étape capitale vous semblera d'une facilité déconcertante
                </p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Légalisations et traduction</h3>
               <p>
                    Notre équipe de linguistes experts dans le domaine est à votre disposition pour toute traduction en russe
                    ou légalisation de vos bulletins, diplômes ou tout autre document.
                    Un service rapide, en ligne, et 100% fiable.
                    {{-- En cas de besoin de traduire vos bulletins, diplômes, ou tout autre document dans la langue russe,
                    notre plateforme met à votre disposition une équipe de linguistes experts dans le domaine. --}}
                </p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-folder mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Gestion du dossier migratoire</h3>
               <p>
                    Soyez assisté et representé par l'un de nos agents durant la constitution de votre dossier d'immagration
                </p>
               </div>
           </div>
           </div>
       </div>
       </div>
   </section>
   <!-- /banner-feature -->

   <!-- about us -->
   <section class="section" id="about-us">
       <div class="container">
       <div class="row align-items-center">
           <div class="col-md-6 order-2 order-md-1">
           <h2 class="section-title">A propos de {{ env('APP_NAME') }}</h2>
           {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p> --}}
           {{-- <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p> --}}
           <p>{{ env('APP_NAME') }} est un cabinet qui octroie les bourses d'études aux étudiants qui désirent aller continuer leurs études dans les universités extérieures dans d'autres pays comme la Russie ,l'Italie, le Canada, ... </p>
           <a href="#" class="btn btn-primary-outline">Lire plus</a>
           </div>
           <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
           <img class="img-fluid w-100" src="{{ asset('assets/images/about/about-us.jpg') }}" alt="about image">
           </div>
       </div>
       </div>
   </section>
   <!-- /about us -->

   <!-- country -->
   <section class="section-sm">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex align-items-center section-title justify-content-between">
                       <h2 class="mb-0 text-nowrap mr-3">Nos pays d'intervention</h2>
                       <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                       {{-- <div>
                       <a href="courses.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">S'inscrire</a>
                       </div> --}}
                   </div>
               </div>
           </div>
           <!-- country list -->
           <div class="row justify-content-center">
               <!-- country item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       {{-- <img class="card-img-top rounded-0" src="{{ asset('assets/images/courses/course-1.jpg') }}" alt="course thumb"> --}}
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/country-flags/russia-flag.png') }}" alt="russia flag">
                       <div class="card-body">
                            {{-- <ul class="list-inline mb-2">
                                <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                                <li class="list-inline-item"><a class="text-color" href="#">Russie</a></li>
                            </ul> --}}
                            <a href="#">
                                <h4 class="card-title">Russie</h4>
                            </a>
                            <p class="card-text mb-4">
                                    Postulez dans l'une des 10 meilleures universités russes et réalisez vous.
                                </p>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#signupModal">S'inscrire</a>
                       </div>
                   </div>
               </div>
               <!-- country item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/country-flags/italy-flag.jpg') }}" alt="italiy flag">
                       <div class="card-body">
                       <a href="#">
                           <h4 class="card-title">Italie</h4>
                       </a>
                       <p class="card-text mb-4">
                            Choisissez l'Italie pour son perfomant système éducatif et sa belle culture.
                        </p>
                       <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#signupModal">S'inscrire</a>
                       </div>
                   </div>
               </div>
               <!-- country item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/country-flags/canada-flag.png') }}" style="height:232px" alt="canada flag">
                       <div class="card-body">
                       <a href="#">
                           <h4 class="card-title">Canada</h4>
                       </a>
                       <p class="card-text mb-4">
                            Rejoignez le Canada pour son haut domaine scientifique avancé.
                            {{-- Avec ses professeurs de qualité, le Canada ne saura qu'être un bon choix pour la suite de vos études. --}}
                        </p>
                       <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#signupModal">S'inscrire</a>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /country list -->
           <!-- mobile see all button -->
           {{-- <div class="row">
               <div class="col-12 text-center">
                   <a href="courses.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
               </div>
           </div> --}}
       </div>
   </section>
   <!-- /country -->

   <!-- cta -->
   <section class="section bg-primary">
       <div class="container">
           <div class="row">
               <div class="col-12 text-center">
               <h6 class="text-white font-secondary mb-0">Cliquez et rejoignez la communauté d'étudiants étrangers</h6>
               <h2 class="section-title text-white">Venez étduier en Russie </h2>
               {{-- <a href="contact.html" class="btn btn-secondary">Rejoindre</a> --}}
               <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#signupModal" >Rejoindre</a>
               </div>
           </div>
       </div>
   </section>
   <!-- /cta -->

   <!-- success story -->
   <section class="section bg-cover mb-5" data-background="{{ asset('assets/images/backgrounds/success-story.jpg') }}" >
       <div class="container">
           <div class="row">
               <div class="col-lg-6 col-sm-4 position-relative success-video">
                    <a class="play-btn venobox" href="https://youtube.com" data-vbtype="video">
                        <i class="ti-control-play"></i>
                    </a>
               </div>
               <div class="col-lg-6 col-sm-8">
                    <div class="bg-secondary-half px-5 pt-5">
                        <h2 class="section-title">Témoignages</h2>
                            <div class="container ">
                                <div class="hero-slider">
                                    <!-- success story item -->
                                    <div class="hero-slider-item p-3">
                                            <div class="">
                                                <p class="text-center text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">
                                                    RUSSEDUC a facilité mon admission dans l'Université d'Etat de Saint Petersbourg.
                                                    Tout s'est fait à distance, très facilement.
                                                    Ils étaient présents à chaque étape pour m'accompagner dans ma procédure.
                                                </p>
                                            </div>
                                    </div>
                                    <!-- success story item -->
                                    <div class="hero-slider-item p-3">
                                            <div class="">
                                                <p class="text-center  text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">
                                                    La traduction de mes bulletins et diplômes en russe a été exceptionnel.
                                                    Il n'a fallu attendre que deux jours pour recevoir mes documents traduits
                                                    Le service est simple et rapide. Je suis satisfait !!
                                                </p>
                                            </div>
                                    </div>
                                    <!-- success story item -->
                                    <div class="hero-slider-item p-3">
                                            <div class="">
                                                <p class="text-center text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">
                                                    Témoignage 3
                                                </p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <div class="h-100 d-inline-block p-5 m-5"></div>
                        <div class="h-100 d-inline-block p-5 m-5"></div>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p> --}}
                    </div>
               </div>
           </div>
       </div>
   </section>
   <!-- /success story -->

   <!-- events -->
   {{-- <section class="section bg-gray">
        <div class="container">
            <div class="row">
               <div class="col-12">
               <div class="d-flex align-items-center section-title justify-content-between">
                   <h2 class="mb-0 text-nowrap mr-3">Evènements à venir</h2>
                   <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                   <div>
                    <a href="#" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">Tout voir</a>
                   </div>
               </div>
               </div>
            </div>
            <div class="row justify-content-center">
               <!-- event -->
               <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                   <div class="card border-0 rounded-0 hover-shadow">
                       <div class="card-img position-relative">
                           <img class="card-img-top rounded-0" src="{{ asset('assets/images/events/event-1.jpg') }}" alt="event thumb">
                           <div class="card-date"><span>18</span><br>December</div>
                       </div>
                       <div class="card-body">
                           <!-- location -->
                           <p><i class="ti-location-pin text-primary mr-2"></i>Harvard, Usa</p>
                           <a href="event-single.html"><h4 class="card-title">Toward a public philosophy of justice</h4></a>
                       </div>
                   </div>
               </div>
               <!-- event -->
               <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card border-0 rounded-0 hover-shadow">
                        <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="{{ asset('assets/images/events/event-2.jpg') }}" alt="event thumb">
                        <div class="card-date"><span>21</span><br>December</div>
                        </div>
                        <div class="card-body">
                        <!-- location -->
                        <p><i class="ti-location-pin text-primary mr-2"></i>Cambridge, USA</p>
                        <a href="event-single.html"><h4 class="card-title">Research seminar in clinical science.</h4></a>
                        </div>
                    </div>
               </div>
               <!-- event -->
                <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card border-0 rounded-0 hover-shadow">
                        <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="{{ asset('assets/images/events/event-3.jpg') }}" alt="event thumb">
                        <div class="card-date"><span>23</span><br>December</div>
                        </div>
                        <div class="card-body">
                        <!-- location -->
                        <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
                        <a href="event-single.html"><h4 class="card-title">Firefly training in trauma-informed yoga</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile see all button -->
            <div class="row">
                <div class="col-12 text-center">
                <a href="course.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">Tout voir</a>
                </div>
            </div>
        </div>
   </section> --}}
   <!-- /events -->

   <!-- teachers -->
   {{-- <section class="section">
       <div class="container">
       <div class="row justify-content-center">
           <div class="col-12">
           <h2 class="section-title">Our Teachers</h2>
           </div>
           <!-- teacher -->
           <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
           <div class="card border-0 rounded-0 hover-shadow">
               <img class="card-img-top rounded-0" src="{{ asset('assets/images/teachers/teacher-1.jpg') }}" alt="teacher">
               <div class="card-body">
               <a href="teacher-single.html">
                   <h4 class="card-title">Jacke Masito</h4>
               </a>
               <p>Teacher</p>
               <ul class="list-inline">
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
               </ul>
               </div>
           </div>
           </div>
           <!-- teacher -->
           <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
           <div class="card border-0 rounded-0 hover-shadow">
               <img class="card-img-top rounded-0" src="{{ asset('assets/images/teachers/teacher-2.jpg') }}" alt="teacher">
               <div class="card-body">
               <a href="teacher-single.html">
                   <h4 class="card-title">Clark Malik</h4>
               </a>
               <p>Teacher</p>
               <ul class="list-inline">
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
               </ul>
               </div>
           </div>
           </div>
           <!-- teacher -->
           <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
           <div class="card border-0 rounded-0 hover-shadow">
               <img class="card-img-top rounded-0" src="{{ asset('assets/images/teachers/teacher-3.jpg') }}" alt="teacher">
               <div class="card-body">
               <a href="teacher-single.html">
                   <h4 class="card-title">John Doe</h4>
               </a>
               <p>Teacher</p>
               <ul class="list-inline">
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                   <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
               </ul>
               </div>
           </div>
           </div>
       </div>
       </div>
   </section> --}}
   <!-- /teachers -->

   <!-- blog -->
   {{-- <section class="section pt-0">
       <div class="container">
           <div class="row">
               <div class="col-12">
               <h2 class="section-title" id="news">Actualités</h2>
               </div>
           </div>
           <div class="row justify-content-center">
               <!-- blog post -->
               <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{ asset('assets/images/blog/post-1.jpg') }}" alt="Post thumb">
                        <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                                <!-- post date -->
                                <li class="list-inline-item mr-3 ml-0">August 28, 2019</li>
                                <!-- author -->
                                <li class="list-inline-item mr-3 ml-0">By Jonathon</li>
                            </ul>
                            <a href="blog-single.html">
                                <h4 class="card-title">The Expenses You Are Thinking.</h4>
                            </a>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
                            <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
                        </div>
                    </div>
               </article>
               <!-- blog post -->
               <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                   <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/blog/post-2.jpg') }}" alt="Post thumb">
                       <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                                <!-- post date -->
                                <li class="list-inline-item mr-3 ml-0">August 13, 2019</li>
                                <!-- author -->
                                <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li>
                            </ul>
                            <a href="blog-single.html">
                                <h4 class="card-title">Tips to Succeed in an Online Course</h4>
                            </a>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
                            <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
                       </div>
                   </div>
               </article>
               <!-- blog post -->
               <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                   <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/blog/post-3.jpg') }}" alt="Post thumb">
                       <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                                <!-- post date -->
                                <li class="list-inline-item mr-3 ml-0">August 24, 2018</li>
                                <!-- author -->
                                <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li>
                            </ul>
                            <a href="blog-single.html">
                                <h4 class="card-title">Orientation Program for the new students</h4>
                            </a>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
                            <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
                       </div>
                   </div>
               </article>
           </div>
       </div>
   </section> --}}
   <!-- /blog -->

   <!-- footer -->
   <x-slot name="footer">
        <!-- newsletter -->
        <div class="newsletter">
             <div class="container">
                 <div class="row">
                 <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
                     <h3 class="text-white">S'inscrire à la newsletter</h3>
                     <form action="#">
                     <div class="input-wrapper">
                         <input type="email" class="form-control form-control-sm border-0" id="newsletter" name="newsletter" placeholder="Entrez votre email...">
                         <button type="submit" value="send" class="btn btn-primary">S'abonner</button>
                     </div>
                     </form>
                 </div>
                 </div>
             </div>
        </div>
        <!-- footer content -->
        <div class="footer bg-footer section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
                        <!-- logo -->
                        <h3 class="mb-5 font-weight-bold text-primary" wire:click="$emit('refresh')">{{ env('APP_NAME') }}</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2">Quartier, Commune, Ville, Russie</li>
                            <li class="mb-2">+225 01 XX XX XX</li>
                            <li class="mb-2">+225 01 YY YY YY </li>
                            <li class="mb-2">mail@mail.com</li>
                        </ul>
                    </div>
                    <!-- company -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">Le cabinet</h4>
                        <ul class="list-unstyled">
                                <li class="mb-3"><a class="text-color" href="#about-us">A propos de nous</a></li>
                                {{-- <li class="mb-3"><a class="text-color" href="teacher.html">Our Teacher</a></li> --}}
                                <li class="mb-3"><a class="text-color" href="#">Contact</a></li>
                                {{-- <li class="mb-3"><a class="text-color" href="blog.html">Actualités</a></li> --}}
                        </ul>
                    </div>
                    <!-- links -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">Nos réseaux</h4>
                        <ul class="list-unstyled">
                            {{-- <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li> --}}
                            <li class="mb-3"><a class="text-color" href="#">Facebook</a></li>
                            <li class="mb-3"><a class="text-color" href="#">LinkedIn</a></li>
                            <li class="mb-3"><a class="text-color" href="#">Instagram</a></li>
                            <li class="mb-3"><a class="text-color" href="#">Twitter</a></li>
                        </ul>
                    </div>
                    <!-- support -->
                    {{-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">SUPPORT</h4>
                        <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="#">Forums</a></li>
                        <li class="mb-3"><a class="text-color" href="#">Documentation</a></li>
                        <li class="mb-3"><a class="text-color" href="#">Language</a></li>
                        <li class="mb-3"><a class="text-color" href="#">Release Status</a></li>
                        </ul>
                    </div> --}}
                    <!-- support -->
                    {{-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">RECOMMEND</h4>
                        <ul class="list-unstyled">
                        <li class="mb-3"><a class="text-color" href="#">WordPress</a></li>
                        <li class="mb-3"><a class="text-color" href="#">LearnPress</a></li>
                        <li class="mb-3"><a class="text-color" href="#">WooCommerce</a></li>
                        <li class="mb-3"><a class="text-color" href="#">bbPress</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </x-slot>
   <!-- /footer -->

</div>
