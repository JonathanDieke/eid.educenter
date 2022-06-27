<div class="container my-4">
    <style>
        .btn-step:hover{
            background: rgb(255,205,110, 0.5)
        }
        .btn-step{
           border : 1px solid rgb(255,205,110, 0.9);
           border-radius:10%
        }

        .display-none {
            display: none;
        }
        .multi-wizard-step p {
            margin-top: 12px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            position: relative;
            width: 100%;
        }
        .multi-wizard-step button[disabled] {
            filter: alpha(opacity=100) !important;
            opacity: 1 !important;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            content: " ";
            width: 100%;
            height: 1px;
            z-order: 0;
            position: absolute;
            background-color: #fefefe;
        }
        .multi-wizard-step {
            text-align: center;
            position: relative;
            display: table-cell;
        }
        input[type="checkbox"] { /* change "blue" browser chrome to yellow */
            /* filter: invert(50%) hue-rotate(18deg) brightness(1.7); */
            accent-color: rgb(255,205,110, 1);
        }
    </style>

    @if(!empty($successMsg))
        <div class="alert alert-success">
            {{ $successMsg }}
        </div>
    @endif
    {{-- Navigation bar --}}
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button" wire:click="setStep(1)" class="btn {{ $currentStep != 1 ? 'btn-default btn-step' : 'btn-primary' }}">1</a>
                <p>Mes informations</p>
            </div>
            {{-- <div class="multi-wizard-step">
                <a href="#step-2" type="button" wire:click="setStep(2)" class="btn {{ $currentStep != 2 ? 'btn-default btn-step' : 'btn-primary' }}">2</a>
                <p>Mes adresses</p>
            </div> --}}
            <div class="multi-wizard-step">
                <a href="#step-3" type="button" wire:click="setStep(2)" class="btn {{ $currentStep != 2 ? 'btn-default btn-step' : 'btn-primary' }}">2</a>
                <p>Mes parents</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button" wire:click="setStep(3)" class="btn {{ $currentStep != 3 ? 'btn-default btn-step' : 'btn-primary' }}">3</a>
                <p>Mon cursus</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-4" type="button" wire:click="setStep(4)" class="btn {{ $currentStep != 4 ? 'btn-default btn-step' : 'btn-primary' }}">4</a>
                <p>Mon cursus détaillé</p>
            </div>

        </div>
    </div>

    <div class="{{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        @livewire('user.user-admission-personnal-info',  ['title' => "Etape 1/4 : Informations personnelles"])
    </div>
    
    <div class="{{ $currentStep != 2    ? 'display-none' : '' }}" id="step-2">
        @livewire('user.user-profile-parent',  ['title' => "Etape 2/4 : Informations sur les parents"])
    </div>
    
    <div class="{{ $currentStep != 3    ? 'display-none' : '' }}" id="step-3">
        @livewire('user.user-profile-cursus',  ['title' => "Etape 3/4 : Mon cursus"])
    </div>
    
    <div class="{{ $currentStep != 4    ? 'display-none' : '' }}" id="step-4">
        @livewire('user.user-profile-detailed-cursus',  ['title' => "Etape 4/4 : Mon cursus détaillé"])
    </div>

    <!-- Modal Add school -->
    <div class="modal fade" id="addSchoolModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static">
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
                        <form  class="row " wire:submit.prevent="register" autocomplete="off">
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            @error('name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                            <select class="custom-select mb-3">
                                <option value="" selected>Etablissement 1</option>
                                <option value="" >Etablissement 2</option>
                                <option value="" >Etablissement 3</option>
                                <option value="" >Etablissement 4</option>
                            </select>
                            <div class="form-row py-3 w-100">
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm" id="" placeholder="Pays" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm" id="" placeholder="Etat/Province" autocomplete="off ">
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
    <!-- Modal Add  school -->

    <!-- Modal Add Formation -->
    <div class="modal fade" id="addFormationModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h6>Ajouter une formation (Etablissement 1) </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div>
                        <form  class="row " wire:submit.prevent="register" autocomplete="off">
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <div class="form-row py-3 w-100">
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm mr-" id="" placeholder="Type de formation" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm" id="" placeholder="Nom du programme" autocomplete="off ">
                                </div>
                            </div>
                            @error('name') <span class="error font-italic text-danger">{{ $message }}</span> @enderror
                            <select class="custom-select mb-3 pr-2">
                                <option selected>Etat d'avancement</option>
                                <option value="" >Abandonnée</option>
                                <option value="" >En cours</option>
                                <option value="" >Terminée</option>
                            </select>
                            <div class="form-row py-3 w-100">
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm mr-" id="" placeholder="Date de début (jj/mm/aaaa)" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                  <input type="text"  class="form-control form-control-sm" id="" placeholder="Date de fin (jj/mm/aaaa)" autocomplete="off ">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Soumettre</button>
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
                    <h6>Mes formations (Etablissement 1) </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="table-responsive">
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
                                <tr>
                                    <td> 1 </td>
                                    <td > Type de formation 1Type de formation 1Type de formation 1 </td>
                                    <td> Programme 1 </td>
                                    <td> Terminé </td>
                                    <td> 09/2021 </td>
                                    <td> 05/2022 </td>
                                    <td class="d-inline-block text-truncate">
                                        <i class="feature-icon-sm ti-plus mx-1" data-toggle="modal" data-target="#"></i>
                                        <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#"></i>
                                        <i class="feature-icon-sm-danger ti-trash mx-1"></i>
                                    </td>
                                </tr>
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


    <x-slot name='footer'>
    </x-slot>
</div>
