<section class="my-4 p-4 bg-gray">
    <x-loading-indicator/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">{{ $title }}  </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <form action="#">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Je vis en Russie :</label>
                            <div id="radio-group col" class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="is_living_in_russia_true" value="1"  wire:model="cursus.is_living_in_russia" checked>
                                    <label class="form-check-label" for="is_living_in_russia_true">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="is_living_in_russia_false" value="0"  wire:model="cursus.is_living_in_russia" >
                                    <label class="form-check-label" for="is_living_in_russia_false">
                                        Non
                                    </label>
                                </div>
                            </div>
                            @if($cursus['is_living_in_russia'])
                                <div class="form-group ">
                                    <label for="">Mon status légal</label>
                                    <br>
                                    <select class="custom-select custom-select-sm col-4 w-100" wire:model.defer="cursus.legal_status">
                                        @foreach ($legalStatusList as $key => $value)
                                            <option value="{{ $key }}" {{ $cursus['legal_status'] == $key ? 'selected' : "" }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <h5 class="mb-2">Mes études pré-unniversitaires</h5>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">J'ai suivi la totalité de mes études primaires en :</label>
                                <div id="radio-group col" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="primary_studies_language_french" value="french" wire:model="cursus.primary_studies_language" checked>
                                        <label class="form-check-label" for="">
                                            Français
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="primary_studies_language_english" value="english" wire:model="cursus.primary_studies_language" >
                                        <label class="form-check-label" for="primary_studies_language_english">
                                            Anglais
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="primary_studies_language_spanish" value="spanish" wire:model="cursus.primary_studies_language" >
                                        <label class="form-check-label" for="primary_studies_language_spanish">
                                            Espagnol
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="primary_studies_language_russian" value="russian" wire:model="cursus.primary_studies_language" >
                                        <label class="form-check-label" for="primary_studies_language_russian">
                                            Russe
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">J'ai suivi la totalité de mes études secondaires en :</label>
                                <div id="radio-group col" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="secondary_studies_language_french" value="french" wire:model="cursus.secondary_studies_language" checked>
                                        <label class="form-check-label" for="">
                                            Français
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="secondary_studies_language_english" value="english" wire:model="cursus.secondary_studies_language" >
                                        <label class="form-check-label" for="secondary_studies_language_english">
                                            Anglais
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="secondary_studies_language_spanish" value="spanish" wire:model="cursus.secondary_studies_language" >
                                        <label class="form-check-label" for="secondary_studies_language_spanish">
                                            Espagnol
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="secondary_studies_language_russian" value="russian" wire:model="cursus.secondary_studies_language" >
                                        <label class="form-check-label" for="secondary_studies_language_russian">
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
                                                <input class="form-check-input" type="radio"  id="is_has_russian_college_diploma_true" value="1" wire:model="cursus.is_has_russian_college_diploma" checked>
                                                <label class="form-check-label" for="is_has_russian_college_diploma_true">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"  id="is_has_russian_college_diploma_false" value="0" wire:model="cursus.is_has_russian_college_diploma" >
                                                <label class="form-check-label" for="is_has_russian_college_diploma_false">
                                                    Non
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">2- un diplôme d'études pré universitaires délivré dans l’un des etats de la Russie  ou à l'extérieur de la Russie ?  :</label>
                                        <div id="radio-group col" class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"  id="is_has_russian_high_school_diploma_true" value="1" wire:model="cursus.is_has_russian_high_school_diploma" checked>
                                                <label class="form-check-label" for="is_has_russian_high_school_diploma_true">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"  id="is_has_russian_high_school_diploma_false" value="0" wire:model="cursus.is_has_russian_high_school_diploma" >
                                                <label class="form-check-label" for="is_has_russian_high_school_diploma_false">
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
                                        <input class="form-check-input" type="radio"  id="is_study_in_russian_university_true" value="1" wire:model="cursus.is_study_in_russian_university" checked>
                                        <label class="form-check-label" for="is_study_in_russian_university_true">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="is_study_in_russian_university_false" value="0" wire:model="cursus.is_study_in_russian_university" >
                                        <label class="form-check-label" for="is_study_in_russian_university_false">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">J'étudie ou j'ai déjà étudié dans une Université dans l’un des Etats de la Russie  ou à l'extérieur de la Russie : </label>
                                <div id="radio-group col" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="is_study_in_university_true" value="1" wire:model="cursus.is_study_in_university" checked>
                                        <label class="form-check-label" for="is_study_in_university_true">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  id="is_study_in_university_false" value="0" wire:model="cursus.is_study_in_university" >
                                        <label class="form-check-label" for="is_study_in_university_false">
                                            Non
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" value="send" class="btn btn-primary" wire:click="backStep">Précédent</button>
                    <button type="button" value="send" class="btn btn-primary" wire:click="saveStep">Enregistrer</button>
                    <button type="button" value="send" class="btn btn-primary" wire:click="nextStep">Suivant</button>
                </form>
            </div>
        </div>
    </div>
</section>
