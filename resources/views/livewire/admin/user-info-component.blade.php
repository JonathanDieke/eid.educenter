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
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Nom : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Prénoms : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->lname }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Genre : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->gender == 'female' ? 'Féminin' : "Masculin" }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Langue maternelle : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->native_language == 'french' ? 'Français' : ($user->native_language == 'english' ? 'Anglais' : ($user->native_language == 'spanish' ? 'Espagnol' : 'Russe')) }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Langue d'usage : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->use_language == 'french' ? 'Français' : ($user->use_language == 'english' ? 'Anglais' : ($user->use_language == 'spanish' ? 'Espagnol' : 'Russe')) }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Date de naissance : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->birthdate }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Pays : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->countryR->name }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Région : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->stateR->name }}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Ville : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{{ $user->cityR->name }}</p>
                            </div>
                        </div>
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
                    <div class="px-4">
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Adresse 1 : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->address1 ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Adresse 2 : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->address2 ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Pays  : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->countryR->name ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Région : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->stateR->name ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Ville : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->cityR->name ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Code Posatl : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->postal_code ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Tel. 1 : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->tel1 ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Tel. 2 : </p>
                            </div>
                            <div class="col-md-6 text-left">
                                <p>{!! $user->address->tel2 ?? "<span class='font-italic text-muted'> NULL </span>"  !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#parentCollapse" aria-expanded="false" aria-controls="parentCollapse">
                        Les Parents
                    </button>
                    </h2>
            </div>

            <div id="parentCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#userInfoAccordion">
                <div class="card-body">
                    <div class="px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Parent 1</h6>
                                <div class="row">
                                    <div class="col-md-6">Lien de parenté : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[0]->link == 'mother' ? "Mère" : "Père" }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Nom : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[0]->name  }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Prénoms : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[0]->lname  }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Parent 2</h6>
                                <div class="row">
                                    <div class="col-md-6">Lien de parenté : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[1]->link == 'mother' ? "Mère" : "Père" }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Nom : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[1]->name  }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Prénoms : </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->theParents[1]->lname  }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#parentCollapse" aria-expanded="false" aria-controls="parentCollapse">
                        Le Cursus
                    </button>
                    </h2>
            </div>

            <div id="parentCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#userInfoAccordion">
                <div class="card-body">
                    <div class="px-4">
                         <div class="row">
                            <div class="col-md-6">
                                <p>Vis en Russie ? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->is_living_in_russia ? 'Oui' : 'Non' }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Status Légal :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->legal_status == 'foreign' ? 'Etranger' : ($user->cursus->legal_status == 'local' ? 'Citoyen(ne) russe né(e) en Russie ' : ($user->cursus->legal_status == 'permanent_resident' ? 'Résident Permanent en Russie' : 'Citoyen(ne) russe né(e) en dehors de la Russie'))}} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Langue des études primaires :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->primary_studies_language  == 'french' ? 'Français' : ($user->cursus->primary_studies_language == 'english' ? 'Anglais' : ($user->cursus->primary_studies_language == 'spanish' ? 'Espagnol' : 'Russe')) }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Langue des études secondaires :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->secondary_studies_language  == 'french' ? 'Français' : ($user->cursus->secondary_studies_language == 'english' ? 'Anglais' : ($user->cursus->secondary_studies_language == 'spanish' ? 'Espagnol' : 'Russe')) }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Détient au moins un diplôme d'études collégiales russe ? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->is_has_russian_college_diploma ? 'Oui' : 'Non' }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Détient au moins un diplôme d'études pré-universitaire russe ? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->is_has_russian_high_school_diploma ? 'Oui' : 'Non' }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Déjà étudié dans une univerisité russe ? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->is_study_in_russian_university ? 'Oui' : 'Non' }} </p>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <p>Déjà étudié dans une univerisité russe ou en dehors ? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->cursus->is_study_in_university ? 'Oui' : 'Non' }} </p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#formationsCollapse" aria-expanded="false" aria-controls="formationsCollapse">
                        Les formations
                    </button>
                    </h2>
            </div>

            <div id="formationsCollapse" class="collapse " aria-labelledby="headingFive" data-parent="#userInfoAccordion">
                <div class="card-body">
                    <div class="px-4">
                        @if (count($user->formations) > 0)
                        <div class="table-responsive ">
                            <table class="table ">
                                <caption>Liste des formations</caption>
                                <thead class="thead-warning">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Etablissement</th>
                                        <th scope="col">Formation</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Période</th>
                                        <th scope="col">Justificatifs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->formations as $formation)
                                        <tr class="text-truncate">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $formation->name }}</td>
                                            <td>{{ $formation->type }}</td>
                                            <td>{{ $formation->program_name }}</td>
                                            <td >
                                                <span class="badge badge-{{ $formation->status == 'En cours' ? 'info' : ($formation->status == 'terminated' ? 'success' : 'danger') }}">{{ $formation->status }}</span>
                                            </td>
                                            <td>{{ $formation->period() }}</td>
                                            <td class="text-center">
                                                <i class="feature-icon-sm ti-files mx-1"   data-toggle="modal" data-target="#showSupportingsModal" wire:click="loadSupporting({{ $formation->id }})"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#admissionRequestCollapse" aria-expanded="false" aria-controls="admissionRequestCollapse">
                        Les Admissions
                    </button>
                    </h2>
            </div>

            <div id="admissionRequestCollapse" class="collapse " aria-labelledby="headingSix" data-parent="#userInfoAccordion">
                <div class="card-body">
                    <div class="px-4">
                        @if (count($user->admissionRequest) > 0)
                        <div class="table-responsive ">
                            <table class="table ">
                                <caption>Liste des demandes d'admissions</caption>
                                <thead class="thead-warning">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Université</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">Cycle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->admissionRequest as $admission_request)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $admission_request->school->name }}</td>
                                            <td>{{ $admission_request->session }}</td>
                                            <td>{{ $admission_request->program->libel }}</td>
                                            <td>{{ $admission_request->cycle }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal show Supportings -->
<div class="modal fade" id="showSupportingsModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Les justificatifs </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="text-center" wire:loading wire:target="loadSupporting">
                    <p class=" font-weight-bold font-italic">Chargement des données...</p>
                </div>
                @if (count($supportings) > 0 )
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="thead-warning">
                                <tr>
                                    <th>#</th>
                                    <th>Justificatifs</th>
                                    <th>Commentaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportings as $supporting)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td > {{ $supporting->filename }} </td>
                                        <td > {{ $supporting->comment }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Modal show Supportings -->
</div>
