<section class="my-4 p-4 bg-gray">
    <x-loading-indicator/>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title">{{ "Mon cursus détaillé" }}</h2>
        </div>
    </div>
    <div class="">
        <div class="col-lg-12 mb-4 mb-lg-0">
            <form action="#">
                <div class="form-group">
                    <a href="#" class="btn btn-secondary btn-sm shadow mb-4 " data-toggle="modal" data-target="#addSchoolModal">Ajouter un établissement </a>
                    <div class="text-center" wire:loading wire:target="deleteUserSchool">
                        <p class=" font-weight-bold font-italic">Actualisation des données...</p>
                    </div>
                    <div class="table-responsive " wire:loading.remove>
                        <table class="table ">
                            <caption>Liste de mes établissements d'enseignement</caption>
                            <thead class="thead-warning">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Etat/Province</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($userSchools as $user_school)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user_school->name }}</td>
                                        <td>{{ $user_school->country }}</td>
                                        <td>{{ $user_school->state }}</td>
                                        <td class="text-truncate">
                                            <i class="feature-icon-sm ti-plus mx-1" data-toggle="modal" data-target="#addFormationModal" wire:click="setUserSchoolFormation({{ $user_school->id }}, '{{ $user_school->name }}', 'add')"></i>
                                            <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#showFormationModal" wire:click="setUserSchoolFormation({{ $user_school->id }}, '{{ $user_school->name }}', 'show')"></i>
                                            <i class="feature-icon-sm-danger ti-trash mx-1" wire:click="deleteUserSchool({{ $user_school->id }})"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                @empty
                                    <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" value="send" class="btn btn-primary" wire:click="backStep">Précédent</button>
                {{-- <button type="button" value="send" class="btn btn-primary" wire:click="saveStep">Enregistrer</button> --}}
                <button type="button" value="send" class="btn btn-primary" data-toggle="modal" data-target="#showFinalModal">Terminer</button>
            </form>
        </div>
    </div>



<!-- Modal Add school -->
<div class="modal fade" id="addSchoolModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Ajouter un établissement d'enseignement </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div>
                    <form  class="row " autocomplete="off">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">

                        @error('user_school.name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                        <input type="text"  class="form-control form-control-sm" id="" placeholder="Etablissement" autocomplete="off" wire:model="user_school.name">
                        <div class="form-row pt-3 w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3" wire:model="user_school.country">
                                    <option selected>Choisissez un pays</option>
                                    <option value="pays1" >Pays 1</option>
                                    <option value="pays2" >Pays 2</option>
                                    <option value="pays3" >Pays 3</option>
                                    <option value="pays4" >Pays 4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" >
                                <select class="custom-select mb-3" wire:model="user_school.state">
                                    <option selected>Choisissez un Etat </option>
                                    <option value="etat1">Etat 1</option>
                                    <option value="etat2" >Etat 2</option>
                                    <option value="etat3" >Etat 3</option>
                                    <option value="etat4" >Etat 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 pt-1">
                            <button type="button" class="btn btn-primary" wire:click="addUserSchool">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add  school -->

<!-- Modal Add Formation -->
<div class="modal fade" id="addFormationModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Ajouter une formation (à {{  $user_school_currentName }}) </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div>
                    <form  class="row " autocomplete="off">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" style="display:none;" wire:model="user_school_currentID">

                        <div class="form-row py-3 w-100">
                            <div class="form-group col-md-6">
                                @error('user_school_formation.type') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Type de formation" autocomplete="off" wire:model="user_school_formation.type">
                            </div>
                            <div class="form-group col-md-6">
                                @error('user_school_formation.program_name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Nom du programme" autocomplete="off "" wire:model="user_school_formation.program_name">
                            </div>
                        </div>
                        @error('user_school_formation.status') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                        <select class="custom-select mb-3 pr-2" wire:model="user_school_formation.status">
                            <option selected>Etat d'avancement</option>
                            <option value="abandoned" >Abandonnée</option>
                            <option value="in_progress" >En cours</option>
                            <option value="terminated" >Terminée</option>
                        </select>
                        <div class="form-row py-3 w-100">
                            <div class="form-group col-md-6">
                                @error('user_school_formation.start_date') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Date de début (jj/mm/aaaa)" autocomplete="off" wire:model="user_school_formation.start_date">
                            </div>
                            <div class="form-group col-md-6">
                                @error('user_school_formation.end_date') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Date de fin (jj/mm/aaaa)" autocomplete="off " wire:model="user_school_formation.end_date">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-primary" wire:click="addUserSchoolFormation">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Formation -->

<!-- Modal show Formation -->
<div class="modal fade" id="showFormationModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Mes formations (à {{  $user_school_currentName }}) </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="text-center" wire:loading wire:target="setUserSchoolFormation, deleteUserSchoolFormation">
                    <p class=" font-weight-bold font-italic">Chargement des données...</p>
                </div>
                <div class="table-responsive" wire:loading.remove>
                    <table class="table ">
                        <thead class="thead-warning">
                            <tr>
                                <th>#</th>
                                <th>Formation</th>
                                <th>Programme</th>
                                <th>Statut</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user_school_currentFormations as $formation)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td > {{ $formation->type }} </td>
                                    <td > {{ $formation->program_name }} </td>
                                    <td > {{ $formation->status }} </td>
                                    <td > {{ $formation->start_date }} </td>
                                    <td > {{ $formation->end_date }} </td>
                                    <td class="">
                                        <i class="feature-icon-sm-danger ti-trash mx-1" wire:click="deleteUserSchoolFormation({{ $formation->id }})"></i>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center font-weight-bold font-italic">Pas de données disponibles</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal show Formation -->

<!-- Modal show Finalisation -->
<div class="modal fade" id="showFinalModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Finalisation </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="alert alert-warning" role="alert">
                    <div class="p-4">
                        <form>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">En tenant compte des directives énoncées plus haut j’affirme avoir déclaré  l’ensemble de mes études  antérieures et actuelles en fournissant les renseignements exactes.</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Terminer mon profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal show Formation -->


</section>
