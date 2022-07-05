<section class="my-4 p-4 bg-gray">
    <x-loading-indicator/>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title">{{ $title }}</h2>
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
                                <input class="form-check-input" type="radio" id="the_parent1_father" value="father" wire:model="theParent1.link" checked>
                                <label class="form-check-label" for="the_parent1_father">
                                    Père
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="the_parent1_mother" value="mother" wire:model="theParent1.link" >
                                <label class="form-check-label" for="the_parent1_mother">
                                    Mère
                                </label>
                            </div>
                        </div>
                            <input type="text" class="form-control form-control-sm mb-3" wire:model="theParent1.name" placeholder="Nom parent 1" >
                            <input type="text" class="form-control form-control-sm mb-3" wire:model="theParent1.lname" placeholder="Prénoms parent 1" >
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <h5>Parent 2</h5>
                        <div id="radio-group" class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="the_parent2_father" value="father" wire:model="theParent2.link" >
                                <label class="form-check-label" for="the_parent2_father">
                                    Père
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="the_parent2_mother" value="mother" wire:model="theParent2.link" checked>
                                <label class="form-check-label" for="the_parent2_mother">
                                    Mère
                                </label>
                            </div>
                        </div>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Nom parent 2" wire:model="theParent2.name">
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Prénoms parent 2" wire:model="theParent2.lname">
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-sm" wire:click="backStep">Précédent</button>
                <button type="button" class="btn btn-primary btn-sm" wire:click="saveStep">Enregistrer</button>
                <button type="button" class="btn btn-primary btn-sm" wire:click="nextStep">Suivant</button>
            </form>
        </div>
    </div>
</section>
