<div class="container">
    <div class="accordion" id="userInfoAccordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#userCollapse" aria-expanded="false" aria-controls="userCollapse">
                        Les informations personnelles
                    </button>
                    </h2>
            </div>

            <div id="userCollapse" class="collapse show" aria-labelledby="headingOne" data-parent="#userInfoAccordion">
                <div class="card-body">
                    <div class="px-4">
                        @foreach ($user as $key => $value)
                            <div class="row ">
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Nom : </p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#addressCollapse" aria-expanded="false" aria-controls="addressCollapse">
                        L'Adresse
                    </button>
                    </h2>
            </div>

            <div id="addressCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#userInfoAccordion">
                <div class="card-body">
                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#parentCollapse" aria-expanded="false" aria-controls="parentCollapse">
                        Les parents
                    </button>
                    </h2>
            </div>

            <div id="parentCollapse" class="collapse" aria-labelledby="headingThree" data-parent="#userInfoAccordion">
                <div class="card-body">
                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                </div>
            </div>
        </div>
    </div>
</div>
