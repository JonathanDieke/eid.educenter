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
                    <a href="#" class="btn btn-secondary btn-sm shadow mb-4 " data-toggle="modal" data-target="#addFormationModal">Ajouter une formation </a>
                    <br>
                    <div class="text-center" wire:loading wire:target="deleteUserSchoolFormation">
                        <p class=" font-weight-bold font-italic">Actualisation des données...</p>
                    </div>
                    @if (count($formations) > 0)
                        <div class="table-responsive ">
                            <table class="table ">
                                <caption>Liste de mes formations</caption>
                                <thead class="thead-warning">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Etablissement</th>
                                        <th scope="col">Formation</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Période</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formations as $formation)
                                        <tr class="text-truncate">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $formation->name }}</td>
                                            <td>{{ $formation->type }}</td>
                                            <td>{{ $formation->program_name }}</td>
                                            <td>{{ $formation->status }}</td>
                                            <td>{{ $formation->start_date . " - " . $formation->end_date  }}</td>
                                            <td >
                                                <i class="feature-icon-sm ti-pencil-alt mx-1"  data-placement="top" title="Modifier la formation" data-toggle="modal" data-target="#addFormationModal" wire:click="setUserSchoolFormation({{ $formation->id }})"></i>
                                                <i class="feature-icon-sm ti-files mx-1"  data-placement="top" title="Ajouter un justificatif" data-toggle="modal" data-target="#addSupportingModal" wire:click="setCurrentFormation({{ $formation->id }}, '{{ $formation->name }}', 'add')"></i>
                                                <i class="feature-icon-sm ti-eye mx-1"  data-placement="top" title="Consulter les justificatifs" data-toggle="modal" data-target="#showSupportingsModal" wire:click="setCurrentFormation({{ $formation->id }}, '{{ $formation->name }}', 'show')"></i>
                                                <i class="feature-icon-sm-danger ti-trash mx-1"  data-placement="top" title="Retirer la formation" wire:click="deleteUserSchoolFormation({{ $formation->id }})"></i>
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
                <button type="button" class="btn btn-primary" wire:click="backStep">Précédent</button>
                {{-- <button type="button" class="btn btn-primary" wire:click="saveStep">Enregistrer</button> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showFinalModal">Terminer</button>
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
                <h6>Ajouter une formation </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div>
                    <form  class="row" autocomplete="off">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        {{-- School information --}}
                        @error("user_school.name")
                            <span class="error font-italic text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-row w-100">
                            <div class="form-group col-md-12">
                                <input type="text"  class="form-control form-control-sm" id="" placeholder="Etablissement" autocomplete="off" wire:model.lazy="user_school_formation.name">
                            </div>
                        </div>
                        <div class="form-row  w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select" wire:model.lazy="user_school_formation.country">
                                    <option selected>Choisissez un pays</option>
                                    <option value="pays1" >Pays 1</option>
                                    <option value="pays2" >Pays 2</option>
                                    <option value="pays3" >Pays 3</option>
                                    <option value="pays4" >Pays 4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" >
                                <select class="custom-select" wire:model.lazy="user_school_formation.state">
                                    <option selected>Choisissez un Etat </option>
                                    <option value="etat1">Etat 1</option>
                                    <option value="etat2" >Etat 2</option>
                                    <option value="etat3" >Etat 3</option>
                                    <option value="etat4" >Etat 4</option>
                                </select>
                            </div>
                        </div>
                        {{-- Formation information --}}
                        <div class="form-row w-100">
                            <div class="form-group col-md-6">
                                @error('user_school_formation.type') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Type de formation" autocomplete="off" wire:model.lazy="user_school_formation.type">
                            </div>
                            <div class="form-group col-md-6">
                                @error('user_school_formation.program_name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Nom du programme" autocomplete="off " wire:model.lazy="user_school_formation.program_name">
                            </div>
                        </div>
                        @error('user_school_formation.status') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                        <div class="form-row w-100">
                            <div class="form-group col-md-12">
                                <select class="custom-select pr-2" wire:model.lazy="user_school_formation.status">
                                    <option selected>Etat d'avancement</option>
                                    <option value="abandoned" >Abandonnée</option>
                                    <option value="in_progress" >En cours</option>
                                    <option value="terminated" >Terminée</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row w-100">
                            <div class="form-group col-md-6">
                                @error('user_school_formation.start_date') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Date de début (aaaa-mm-jj)" autocomplete="off" wire:model.lazy="user_school_formation.start_date">
                            </div>
                            <div class="form-group col-md-6">
                                @error('user_school_formation.end_date') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                                <input type="text"  class="form-control form-control-sm" placeholder="Date de fin (aaaa-mm-jj)" autocomplete="off " wire:model.lazy="user_school_formation.end_date">
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

<!-- Modal Add Supporting -->
<div class="modal fade" id="addSupportingModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Ajouter un justificatif ({{  $currentSchoolName }}) </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">

                <div class="alert alert-info ">
                    Les justifcatifs peuvent être uniquement de format <span class="font-italic"> jpeg, jpg, png, ou pdf avec une taille maximale de 1 MB</span>.
                </div>

                {{-- <div wire:loading wire:target="supporting.filename" class="d-block font-italic mb-1">Chargement du fichier...</div> --}}

                <form wire:submit.prevent="addSupporting">
                    @error('supporting.filename') <span class="text-danger">{{ $message }}</span> @enderror
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="supporting" required wire:model="supporting.filename">
                            <label class="custom-file-label" for="supporting">Choisir un fichier...</label>
                        </div>
                    </div>
                    @error('supporting.comment') <span class="text-danger">{{ $message }}</span> @enderror
                    <div class="form-group">
                        <input type="text"  class="form-control form-control-sm" id="" placeholder="Commentaire" autocomplete="off" wire:model.lazy="supporting.comment">
                    </div>

                    {{-- @if ($supporting["file"])
                        <div class="d-block mb-3">
                            Prévisulation : <br>
                            <img height="100" width="100" src="{{ $supporting["file"]->temporaryUrl() }}">
                        </div>
                    @endif --}}

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Modal Add Supporting -->

<!-- Modal show Supportings -->
<div class="modal fade" id="showSupportingsModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h6>Mes justificatifs ({{  $currentSchoolName }}) </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="text-center" wire:loading wire:target="setCurrentSchoolName">
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportings as $supporting)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td > {{ $supporting->filename }} </td>
                                        <td > {{ $supporting->comment }} </td>
                                        <td class="text-truncate">
                                            <i class="feature-icon-sm-danger ti-trash mx-1" data-placement="top" title="Supprimer le justificatif" wire:click="deleteSupporting( {{ $supporting->id }} )"></i>
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
<!-- Modal show Supportings -->

<!-- Modal show Formation -->
{{-- <div class="modal fade" id="showFormationModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
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
                                    <td class="text-truncate">
                                        <i class="feature-icon-sm ti-files mx-1" data-placement="top" title="Ajouter un justificatif" wire:click=""></i>
                                        <i class="feature-icon-sm ti-eye mx-1" data-placement="top" title="Consulter les justificatifs" wire:click=""></i>
                                        <i class="feature-icon-sm-danger ti-trash mx-1" data-placement="top" title="Supprimer une formation" wire:click="deleteUserSchoolFormation({{ $formation->id }})"></i>
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
</div> --}}
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
