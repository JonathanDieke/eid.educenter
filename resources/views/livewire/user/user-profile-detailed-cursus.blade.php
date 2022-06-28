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
                <button type="button" value="send" class="btn btn-primary" wire:click="$emit('setStep',3)">Précédent</button>
                <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                <button type="button" value="send" class="btn btn-primary" data-toggle="modal" data-target="#showFinalModal">Terminer</button>
            </form>
        </div>
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

</section>
