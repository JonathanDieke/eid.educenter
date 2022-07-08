<div class="container">
    <div class="p-2 my-4">
        <div class="row">
            @foreach ($schools as $school)
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $school->name }}</h5>
                            <p class="card-text">Ville : {{ $school->city }}</p>
                            <p class="card-text">Rang national : {{ $school->local_rank }} </p>
                            <p class="card-text">Rang international : {{ $school->international_rank }}</p>
                            <a href="{{ $school->website }}" class="btn btn-primary">Site web</a>
                        </div>
                    </div>
                </div>

            @endforeach
            {{-- <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Université d’État de Saint-Pétersbourg</h5>
                        <p class="card-text">Ville : Moscou</p>
                        <p class="card-text">Rang national : 1 </p>
                        <p class="card-text">Rang international : 242</p>
                        <a href="#" class="btn btn-primary">Site web</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
