<section class="my-4 p-4 bg-gray">
    <div class="row">
        <div class="col-lg-12 mb-4 mb-lg-0">
            <form action="#">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">{{ $title }}</h2>
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
                <button type="submit" class="btn btn-primary">Enregistrer</button> 
                <button type="button" class="btn btn-primary" wire:click="$emit('setStep', 2)">Suivant</button>
            </form>
        </div>
    </div>
</section>