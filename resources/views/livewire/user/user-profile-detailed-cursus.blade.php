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
                <button type="button" value="send" class="btn btn-primary" wire:click="$emit('setStep',3)">Précédent</button>
                <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                <button type="button" value="send" class="btn btn-primary" data-toggle="modal" data-target="#showFinalModal">Terminer</button>
            </form>
        </div>
    </div>
</section>