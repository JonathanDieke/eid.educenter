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

    {{-- @livewire('user.user-admission-personnal-info',  ['title' => "Etape 1/4 : Informations personnelles"]) --}}
    <div class="{{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <section class="my-4 p-4 bg-gray">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="section-title">{{ "Informations personnelles" }}</h2>
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm  " wire:model="name" placeholder="Nom">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm " wire:model="lname" placeholder="Prénoms">
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm " wire:model="birthdate" placeholder="Date de naissance">
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Pays de naissance</option>
                                    <option value="" >Pays 1</option>
                                    <option value="" >Pays 2</option>
                                    <option value="" >Pays 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Province/Etat de naissance</option>
                                    <option value="" >Province/Etat 1</option>
                                    <option value="" >Province/Etat 2</option>
                                    <option value="" >Province/Etat 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Ville de naissance</option>
                                    <option value="" >Ville 1</option>
                                    <option value="" >Ville 2</option>
                                    <option value="" >Ville 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Langue maternelle</option>
                                    <option value="" >Français</option>
                                    <option value="" >Anglais</option>
                                    <option value="" >Espagnol</option>
                                    <option value="" >Russe</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Langue d'usage</option>
                                    <option value="" >Français</option>
                                    <option value="" >Anglais</option>
                                    <option value="" >Espagnol</option>
                                    <option value="" >Russe</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="section-title">{{ "Mes adresses" }}</h2>
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm" wire:model="" placeholder="Adresse 1">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm" wire:model="lname" placeholder="Adresse 2">
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Pays actuel</option>
                                    <option value="" >Pays 1</option>
                                    <option value="" >Pays 2</option>
                                    <option value="" >Pays 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Province/Etat actuel</option>
                                    <option value="" >Province/Etat 1</option>
                                    <option value="" >Province/Etat 2</option>
                                    <option value="" >Province/Etat 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <select class="custom-select mb-3">
                                    <option selected>Ville actuel</option>
                                    <option value="" >Ville 1</option>
                                    <option value="" >Ville 2</option>
                                    <option value="" >Ville 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm" wire:model="nativeLanguage" placeholder="Code postal">
                            </div>
                        </div>
                        <div class="form-row py-1 w-100">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm" wire:model="useLanguage" placeholder="Tel. 1">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-sm" wire:model="useLanguage" placeholder="Tel. 2">
                            </div>
                        </div>
                        <button type="submit" value="send" class="btn btn-primary">Enregistrer</button>
                        {{-- <button type="submit" value="send" class="btn btn-primary">Annuler</button> --}}
                        <button type="button" value="send" class="btn btn-primary" wire:click="secondStepSubmit">Suivant</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="{{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <section class="my-4 p-4 bg-gray">
            <div class="">
              <div class="row">
                <div class="col-lg-12">
                  <h2 class="section-title">{{ "Adresse Personnelle" }}</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                  <form action="#">
                   <input type="text" class="form-control mb-3" wire:model="birthdate" placeholder="Pays">
                    <input type="text" class="form-control mb-3" wire:model="nativeState" placeholder="Province/Etat ">
                    <input type="text" class="form-control mb-3" wire:model="nativeCity" placeholder="Ville">
                    <input type="text" class="form-control mb-3" wire:model="nativeLanguage" placeholder="Code postal">
                    <input type="text" class="form-control mb-3" wire:model="useLanguage" placeholder="Tel. 1">
                    <input type="text" class="form-control mb-3" wire:model="nativeCountry" placeholder="Tel. 2">
                    <input type="email" class="form-control mb-3" wire:model="nativeCountry" placeholder="Email">

                    <button type="button" value="send" class="btn btn-primary" wire:click="setStep(1)">Précédent</button>
                    <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                    <button type="button" value="send" class="btn btn-primary" wire:click="setStep(3)">Suivant</button>
                  </form>
                </div>

              </div>
            </div>
        </section>
    </div> --}}
    <div class="{{ $currentStep != 2    ? 'display-none' : '' }}" id="step-2">
        <section class="my-4 p-4 bg-gray">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">{{ "Informations sur les parents" }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <form action="#">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h5>Parent 1</h5>
                                <div id="radio-group" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="" id="" value="option1" checked>
                                        <label class="form-check-label" for="">
                                            Père
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="" id="" value="option2" >
                                        <label class="form-check-label" for="1">
                                            Mère
                                        </label>
                                    </div>

                                </div>
                                    <input type="text" class="form-control form-control-sm mb-3" wire:model="name" placeholder="Nom parent 1">
                                    <input type="text" class="form-control form-control-sm mb-3" wire:model="lname" placeholder="Prénoms parent 1">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <h5>Parent 2</h5>
                                <div id="radio-group" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="" value="option3" >
                                        <label class="form-check-label" for="">
                                            Père
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="" value="option4" checked>
                                        <label class="form-check-label" for="">
                                            Mère
                                        </label>
                                    </div>
                                </div>
                                    <input type="text" class="form-control form-control-sm mb-3" wire:model="name" placeholder="Nom parent 2">
                                    <input type="text" class="form-control form-control-sm mb-3" wire:model="lname" placeholder="Prénoms parent 2">
                            </div>
                        </div>

                        <button type="button" value="send" class="btn btn-primary" wire:click="setStep(1)">Précédent</button>
                        <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                        <button type="button" value="send" class="btn btn-primary" wire:click="setStep(3)">Suivant</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="{{ $currentStep != 3    ? 'display-none' : '' }}" id="step-3">
        <section class="my-4 p-4 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">{{ "Mon cursus" }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-lg-0">
                        <form action="#">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Je vis en Russie :</label>
                                    <div id="radio-group col" class="mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="" value="option5" checked>
                                            <label class="form-check-label" for="">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="" value="option6" >
                                            <label class="form-check-label" for="1">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mon status légal</label>
                                        <br>
                                        <select class="custom-select custom-select-sm col-4">
                                            <option value="1" selected>Citoyen russe né(e) en Russie</option>
                                            <option value="2">Citoyen(ne) russe né(e) en dehors de la Russie</option>
                                            <option value="3">Résident permanent en Russie </option>
                                            <option value="3">Etranger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <h5 class="mb-2">Mes études pré-unniversitaires</h5>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">J'ai suivi la totalité de mes études primaires en :</label>
                                        <div id="radio-group col" class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                <label class="form-check-label" for="">
                                                    Français
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                <label class="form-check-label" for="1">
                                                    Anglais
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option9" >
                                                <label class="form-check-label" for="1">
                                                    Espagnol
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option10" >
                                                <label class="form-check-label" for="1">
                                                    Russe
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">J'ai suivi la totalité de mes études secondaires en :</label>
                                        <div id="radio-group col" class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                <label class="form-check-label" for="">
                                                    Français
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                <label class="form-check-label" for="1">
                                                    Anglais
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option9" >
                                                <label class="form-check-label" for="1">
                                                    Espagnol
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option10" >
                                                <label class="form-check-label" for="1">
                                                    Russe
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ml-3">
                                        <p>Je détiens au minimum ou j'obtiendrai :</p>
                                        <div class="row ml-3 -mt-2">
                                            <div class="form-group col-6">
                                                <label for="">1- un diplôme d’études collégiales délivré par le gouvernement Russe :</label>
                                                <div id="radio-group col" class="mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                        <label class="form-check-label" for="">
                                                            Oui
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                        <label class="form-check-label" for="1">
                                                            Non
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="">2- un diplôme d'études pré universitaires délivré dans l’un des etats de la Russie  ou à l'extérieur de la Russie ?  :</label>
                                                <div id="radio-group col" class="mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                        <label class="form-check-label" for="">
                                                            Oui
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                        <label class="form-check-label" for="1">
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">Mes études unniversitaires</h5>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">J'étudie ou j'ai déjà étudié dans une Université Russe :</label>
                                        <div id="radio-group col" class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                <label class="form-check-label" for="">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                <label class="form-check-label" for="1">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">J'étudie ou j'ai déjà étudié dans une Université dans l’un des Etats de la Russie  ou à l'extérieur de la Russie : </label>
                                        <div id="radio-group col" class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option7" checked>
                                                <label class="form-check-label" for="">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="" id="" value="option8" >
                                                <label class="form-check-label" for="1">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" value="send" class="btn btn-primary" wire:click="setStep(2)">Précédent</button>
                            <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                            <button type="button" value="send" class="btn btn-primary" wire:click="setStep(4)">Suivant</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="{{ $currentStep != 4    ? 'display-none' : '' }}" id="step-4">
        <section class="my-4 p-4 bg-gray">
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
                            <div class="table-responsive ">
                                <table class="table ">
                                    <caption>Liste de mes établissements d'enseignement</caption>
                                    <thead class="thead-warning">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Etat/Province</th>
                                        <th scope="col">Pays</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td class="text-truncate">
                                                <i class="feature-icon-sm ti-plus mx-1" data-toggle="modal" data-target="#addFormationModal"></i>
                                                <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#showFormationModal"></i>
                                                <i class="feature-icon-sm-danger ti-trash mx-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>
                                                <i class="feature-icon-sm ti-plus mx-1" ></i>
                                                <i class="feature-icon-sm ti-eye mx-1"></i>
                                                <i class="feature-icon-sm-danger ti-trash mx-1"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" value="send" class="btn btn-primary" wire:click="setStep(3)">Précédent</button>
                        <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                        <button type="button" value="send" class="btn btn-primary" data-toggle="modal" data-target="#showFinalModal">Terminer</button>
                    </form>
                </div>
            </div>
        </section>
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
