<div>
    <x-loading-indicator/>
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
                            <input type="text" class="form-control form-control-sm  " wire:model="user.name" placeholder="Nom" >
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm " wire:model="user.lname" placeholder="Prénoms">
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control form-control-sm " wire:model="user.birthdate" placeholder="Date de naissance">
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.country">
                                <option selected>Pays de naissance</option>
                                <option value="" >Pays 1</option>
                                <option value="" >Pays 2</option>
                                <option value="" >Pays 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.state">
                                <option selected>Province/Etat de naissance</option>
                                <option value="" >Province/Etat 1</option>
                                <option value="" >Province/Etat 2</option>
                                <option value="" >Province/Etat 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.city">
                                <option selected>Ville de naissance</option>
                                <option value="" >Ville 1</option>
                                <option value="" >Ville 2</option>
                                <option value="" >Ville 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.native_language">
                                <option>Langue maternelle</option>
                                @foreach ($languages as $key => $value)
                                    <option value="{{ $key }}" {{ $user['native_language'] == $key ? 'selected' : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.use_language">
                                <option>Langue d'usage</option>
                                @foreach ($languages as $key => $value)
                                    <option value="{{ $key }}" {{ $user['use_language'] == $key ? 'selected' : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="user.gender">
                                <option selected>Gender</option>
                                <option value="male" {{ $user['gender'] == 'male' ? 'selected' : "" }}>Masculin</option>
                                <option value="female"  {{ $user['gender'] == 'female' ? 'selected' : "" }} >Féminin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control form-control-sm" wire:model="user.email" placeholder="E-mail" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="section-title">{{ "Mes adresses" }}</h2>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" wire:model="address.address1" placeholder="Adresse 1">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" wire:model="address.address2" placeholder="Adresse 2">
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="address.country">
                                <option selected>Pays actuel</option>
                                <option value="pays1" >Pays 1</option>
                                <option value="pays2" >Pays 2</option>
                                <option value="pays3" >Pays 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="address.state">
                                <option selected>Province/Etat actuel</option>
                                <option value="state1" >Province/Etat 1</option>
                                <option value="state2" >Province/Etat 2</option>
                                <option value="state3" >Province/Etat 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select mb-3" wire:model="address.city">
                                <option selected>Ville actuel</option>
                                <option value="city1" >Ville 1</option>
                                <option value="city2" >Ville 2</option>
                                <option value="city3" >Ville 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" wire:model="address.postal_code" placeholder="Code postal">
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" wire:model="address.tel1" placeholder="Tel. 1">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" wire:model="address.tel2" placeholder="Tel. 2">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" wire:click="saveStep">Enregistrer</button>
                    <button type="button" class="btn btn-primary" wire:click="nextStep">Suivant</button>
                </form>
            </div>
        </div>
    </section>
</div>
