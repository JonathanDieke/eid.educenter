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
                            <select class="custom-select" wire:model="user.country">
                                <option selected>Pays de naissance</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select" wire:model="user.state">
                                <option selected>Etat de naissance</option>
                                @foreach ($userStates as $state)
                                    <option value="{{ $state->id }}" >{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select" wire:model="user.city">
                                <option selected>Ville de naissance</option>
                                @foreach ($userCities as $city)
                                    <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select" wire:model="user.native_language">
                                <option>Langue maternelle</option>
                                @foreach ($languages as $key => $value)
                                    <option value="{{ $key }}" {{ $user['native_language'] == $key ? 'selected' : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select" wire:model="user.use_language">
                                <option>Langue d'usage</option>
                                @foreach ($languages as $key => $value)
                                    <option value="{{ $key }}" {{ $user['use_language'] == $key ? 'selected' : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            <select class="custom-select" wire:model="user.gender">
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
                            @error('address.country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select class="custom-select" wire:model="address.country" required>
                                <option selected>Pays actuel</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            @error('address.state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select class="custom-select" wire:model="address.state" required>
                                <option selected>Etat actuel</option>
                                @foreach ($addressStates as $state)
                                    <option value="{{ $state->id }}" >{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-1 w-100">
                        <div class="form-group col-md-6">
                            @error('address.city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select class="custom-select" wire:model="address.city" required>
                                <option selected>Ville actuel</option>
                                @foreach ($addressCities as $city)
                                    <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                @endforeach
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
                    <button type="button" class="btn btn-primary btn-sm" wire:click="saveStep">Enregistrer</button>
                    <button type="button" class="btn btn-primary btn-sm" wire:click="nextStep">Suivant</button>
                </form>
            </div>
        </div>
    </section>
</div>
