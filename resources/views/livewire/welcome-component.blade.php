<div>

   <!-- Modal Register -->
   <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self wire:click="setForm('registerForm')">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content rounded-0 border-0 p-4">
               <div class="modal-header border-0">
                   <h3>Inscription</h3>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <form  class="row" wire:submit.prevent="register" autocomplete="off">
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <div class="col-12">
                                @error('name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text" class="form-control mb-3" wire:model="name"  placeholder="Nom">
                            </div>
                            <div class="col-12">
                                @error('email') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="email" class="form-control mb-3" wire:model="email" placeholder="Email" autocomplete="off ">
                            </div>
                            <div class="col-12">
                                @error('password') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="password" class="form-control mb-3" wire:model="password"  placeholder="Mot de passe">
                            </div>
                            <div class="col-12">
                                @error('password_confirmation') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="password" class="form-control mb-3" wire:model="password_confirmation"  placeholder="Confirmez mot de passe">
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
   <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self wire:click="setForm('loginForm')">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content rounded-0 border-0 p-4">
               <div class="modal-header border-0">
                   <h3>Connexion</h3>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form wire:submit.prevent="login" class="row" autocomplete="off">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                       <div class="col-12">
                            @error('email') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                            <input type="email" class="form-control mb-3" wire:model="email" placeholder="Email">
                        </div>
                        <div class="col-12">
                           @error('password') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                           <input type="password" class="form-control mb-3" wire:model="password" placeholder="Mot de passe">
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
               <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Your bright future is our mission</h1>
               <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor
                   incididunt ut labore et
                   dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
               <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
               </div>
           </div>
           </div>
           <!-- slider item -->
           <div class="hero-slider-item">
           <div class="row">
               <div class="col-md-8">
               <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Your bright future is our mission</h1>
               <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor
                   incididunt ut labore et
                   dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
               <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
               </div>
           </div>
           </div>
           <!-- slider item -->
           <div class="hero-slider-item">
           <div class="row">
               <div class="col-md-8">
               <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Your bright future is our mission</h1>
               <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor
                   incididunt ut labore et
                   dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
               <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
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
               <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Service 1</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                   et dolore magna aliqua. Ut enim ad</p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Service 2</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                   et dolore magna aliqua. Ut enim ad</p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Service 3</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                   et dolore magna aliqua. Ut enim ad</p>
               </div>
               <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
               <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
               <h3 class="mb-xl-4 mb-lg-3 mb-4">Service 4</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                   et dolore magna aliqua. Ut enim ad</p>
               </div>
           </div>
           </div>
       </div>
       </div>
   </section>
   <!-- /banner-feature -->

   <!-- about us -->
   <section class="section">
       <div class="container">
       <div class="row align-items-center">
           <div class="col-md-6 order-2 order-md-1">
           <h2 class="section-title">A propos de EduCenter</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
           <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
           <a href="about.html" class="btn btn-primary-outline">Learn more</a>
           </div>
           <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
           <img class="img-fluid w-100" src="{{ asset('assets/images/about/about-us.jpg') }}" alt="about image">
           </div>
       </div>
       </div>
   </section>
   <!-- /about us -->

   <!-- courses -->
   <section class="section-sm">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex align-items-center section-title justify-content-between">
                       <h2 class="mb-0 text-nowrap mr-3">Our Course</h2>
                       <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                       <div>
                       <a href="courses.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
                       </div>
                   </div>
               </div>
           </div>
           <!-- course list -->
           <div class="row justify-content-center">
               <!-- course item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/courses/course-1.jpg') }}" alt="course thumb">
                       <div class="card-body">
                       <ul class="list-inline mb-2">
                           <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                           <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
                       </ul>
                       <a href="course-single.html">
                           <h4 class="card-title">Photography</h4>
                       </a>
                       <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                           incididunt ut labore et dolore magna.</p>
                       <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                       </div>
                   </div>
               </div>
               <!-- course item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/courses/course-2.jpg') }}" alt="course thumb">
                       <div class="card-body">
                       <ul class="list-inline mb-2">
                           <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                           <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
                       </ul>
                       <a href="course-single.html">
                           <h4 class="card-title">Programming</h4>
                       </a>
                       <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                           incididunt ut labore et dolore magna.</p>
                       <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                       </div>
                   </div>
               </div>
               <!-- course item -->
               <div class="col-lg-4 col-sm-6 mb-5">
                   <div class="card p-0 border-primary rounded-0 hover-shadow">
                       <img class="card-img-top rounded-0" src="{{ asset('assets/images/courses/course-3.jpg') }}" alt="course thumb">
                       <div class="card-body">
                       <ul class="list-inline mb-2">
                           <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                           <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
                       </ul>
                       <a href="course-single.html">
                           <h4 class="card-title">Lifestyle Archives</h4>
                       </a>
                       <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                           incididunt ut labore et dolore magna.</p>
                       <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /course list -->
           <!-- mobile see all button -->
           <div class="row">
               <div class="col-12 text-center">
                   <a href="courses.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
               </div>
           </div>
       </div>
   </section>
   <!-- /courses -->

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
   <section class="section bg-cover" data-background="{{ asset('assets/images/backgrounds/success-story.jpg') }}">
       <div class="container">
           <div class="row">
               <div class="col-lg-6 col-sm-4 position-relative success-video">
               <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
                   <i class="ti-control-play"></i>
               </a>
               </div>
               <div class="col-lg-6 col-sm-8">
               <div class="bg-white p-5">
                   <h2 class="section-title">Témoignages</h2>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
               </div>
               </div>
           </div>
       </div>
   </section>
   <!-- /success story -->

   <!-- events -->
   <section class="section bg-gray">
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
   </section>
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
   <section class="section pt-0">
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
   </section>
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
                         <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Entrez votre email...">
                         <button type="submit" value="send" class="btn btn-primary">Rejoindre</button>
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
                     <a class="logo-footer" href="index.html"><img class="img-fluid mb-4" src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                     <ul class="list-unstyled">
                     <li class="mb-2">Adresse, rue, ville, pays</li>
                     <li class="mb-2">Tel 1</li>
                     <li class="mb-2">Tel 2</li>
                     <li class="mb-2">email</li>
                     </ul>
                 </div>
                 <!-- company -->
                 <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                     <h4 class="text-white mb-5">COMPANY</h4>
                     <ul class="list-unstyled">
                             <li class="mb-3"><a class="text-color" href="about.html">A propos de nous</a></li>
                             {{-- <li class="mb-3"><a class="text-color" href="teacher.html">Our Teacher</a></li> --}}
                             <li class="mb-3"><a class="text-color" href="contact.html">Contact</a></li>
                             <li class="mb-3"><a class="text-color" href="blog.html">Actualités</a></li>
                     </ul>
                 </div>
                 <!-- links -->
                 <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                     <h4 class="text-white mb-5">LINKS</h4>
                     <ul class="list-unstyled">
                     {{-- <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li> --}}
                     <li class="mb-3"><a class="text-color" href="event.html">Evènements</a></li>
                     <li class="mb-3"><a class="text-color" href="gallary.html">Gallary</a></li>
                     <li class="mb-3"><a class="text-color" href="faqs.html">FAQs</a></li>
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
