<div class="container">
    <style>
        .profile-card-4 {
            /* max-width: 300px; */
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
        }

        .profile-card-4 img {
            transition: all 0.25s linear;
        }

        .profile-card-4 .profile-content {
            position: relative;
            padding: 15px;
            background-color: #FFF;
        }

        .profile-card-4 .profile-name {
            font-weight: bold;
            position: absolute;
            left: 0px;
            right: 0px;
            top: -70px;
            color: #FFF;
            font-size: 17px;
        }

        .profile-card-4 .profile-name p {
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1.5px;
        }

        .profile-card-4 .profile-description {
            color: #777;
            font-size: 12px;
            padding: 10px;
        }

        .profile-card-4 .profile-overview {
            padding: 15px 0px;
        }

        .profile-card-4 .profile-overview p {
            font-size: 10px;
            font-weight: 600;
            color: #777;
        }

        .profile-card-4 .profile-overview h4 {
            color: #273751;
            font-weight: bold;
        }

        .profile-card-4 .profile-content::before {
            content: "";
            position: absolute;
            height: 20px;
            top: -10px;
            left: 0px;
            right: 0px;
            background-color: #FFF;
            z-index: 0;
            transform: skewY(3deg);
        }

        .profile-card-4:hover img {
            transform: rotate(5deg) scale(1.1, 1.1);
            filter: brightness(110%);
        }


        /*Profile Card 5*/
        .profile-card-5{
            margin-top:20px;
        }
        .profile-card-5 .btn{
            border-radius:2px;
            text-transform:uppercase;
            font-size:12px;
            padding:7px 20px;
        }
        .profile-card-5 .card-img-block {
            width: 91%;
            margin: 0 auto;
            position: relative;
            top: -20px;

        }
        .profile-card-5 .card-img-block img{
            border-radius:5px;
            box-shadow:0 0 10px rgba(0,0,0,0.63);
        }
        .profile-card-5 h5{
            color:#4E5E30;
            font-weight:600;
        }
        .profile-card-5 p{
            font-size:14px;
            font-weight:300;
        }
        .profile-card-5 .btn-primary{
            background-color:#4E5E30;
            border-color:#4E5E30;
        }
    </style>

    <div class="my-4">
        <h5>
            Nos actualités
        </h5>
        <hr>
        <div class="news">
            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="profile-card-4 text-center">
                        <img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-4.jpg" class="img img-responsive">
                        <div class="profile-content">
                            <div class="profile-name">John Doe
                                <p>@johndoedesigner</p>
                            </div>
                            <div class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>TWEETS</p>
                                        <h4>1300</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>FOLLOWERS</p>
                                        <h4>250</h4></div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="profile-overview">
                                        <p>FOLLOWING</p>
                                        <h4>168</h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4 mt-4">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c" alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                        <h5 class="card-title">Florence Garza</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    </div>
                    <p class="mt-3 w-100 float-left text-center"><strong>Card with Floting Picture</strong></p>
                </div> --}}

                @foreach ($news as $new)
                    <div class="col-md-4 mt-4">
                        <div class="card profile-card-5">
                            <div class="card-img-block">
                                <img class="card-img-top" src="{{ asset('storage') . '/' . $new->images[0]->image }}" alt="Card image cap" height="250">
                            </div>
                            <div class="card-body pt-0">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="text-muted font-italic">{{ $new->news_date }}</p>
                                <p class="card-text">{{ $new->abstract }}</p>
                            </div>
                        </div>
                        {{-- <p class="mt-3 w-100 float-left text-center"><strong>Card with Floting Picture</strong></p> --}}
                    </div>
                @endforeach
            </div>

            {{ $news->links() }}
        </div>
    </div>
</div>
