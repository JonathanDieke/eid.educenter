<section class="my-4 p-4 bg-gray">
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

                <button type="button" value="send" class="btn btn-primary" wire:click="$emit('setStep',1)">Précédent</button>
                <button type="button" value="send" class="btn btn-primary">Enregistrer</button>
                <button type="button" value="send" class="btn btn-primary" wire:click="$emit('setStep',3)">Suivant</button>
            </form>
        </div>
    </div>
</section>