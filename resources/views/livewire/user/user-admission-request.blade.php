<div class="container my-4">
    <div >
        <section class="my-4 p-4 bg-gray">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Mes demandes </h2>
                </div>
            </div>
            <div class="">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <form action="#">
                        <div class="form-group">
                            <a href="#" class="btn btn-secondary btn-sm shadow mb-4 " data-toggle="modal" data-target="#createRequestModal">Créer une demande </a>
                            <div class="table-responsive ">
                                <table class="table ">
                                    <caption>Liste de mes demandes d'admission</caption>
                                    <thead class="thead-warning">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Université</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Programme</th>
                                            <th scope="col">Cycle</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Université 1</td>
                                            <td>Eté</td>
                                            <td>Programme 1</td>
                                            <td>Premier cycle</td>
                                            <td class="text-truncate">
                                                <i class="feature-icon-sm ti-plus mx-1" data-toggle="modal" data-target="#"></i>
                                                <i class="feature-icon-sm ti-eye mx-1" data-toggle="modal" data-target="#"></i>
                                                <i class="feature-icon-sm-danger ti-trash mx-1"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal create admission request -->
    <div class="modal fade" id="createRequestModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" and data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h6>Créer une demande d'admission </h6>
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
                                <option  selected>Choisissez une université</option>
                                <option value="" >Université 1</option>
                                <option value="" >Université 2</option>
                                <option value="" >Université 3</option>
                                <option value="" >Université 4</option>
                            </select>
                            <div class="form-row py-3 w-100">
                                <div class="form-group col-md-6">
                                    <select class="custom-select mb-3">
                                        <option  selected>Choisissez une session</option>
                                        <option value="" >Automne</option>
                                        <option value="" >Hiver</option>
                                        <option value="" >Eté</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="custom-select mb-3">
                                        <option  selected>Choisissez un cycle</option>
                                        <option value="" >Premier cycle</option>
                                        <option value="" >Deuxième cycle</option>
                                        <option value="" >Troisième cycle</option>
                                    </select>
                                </div>
                                <select class="custom-select mb-3">
                                    <option  selected>Choisissez un programme</option>
                                    <option value="" >Programme 1</option>
                                    <option value="" >Programme 2</option>
                                    <option value="" >Programme 3</option>
                                </select>
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
    <!-- Modal Acreate admission request -->

    <x-slot name="footer">
    </x-slot>
</div>
