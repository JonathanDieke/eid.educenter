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

    <x-loading-indicator/>

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
                <a href="#step-2" type="button" wire:click="setStep(2)" class="btn {{ $currentStep != 2 ? 'btn-default btn-step' : 'btn-primary' }}">2</a>
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

    <div class="{{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        @livewire('user.user-admission-personnal-info',  ['title' => "Etape 1/4 : Informations personnelles", "user"=> $user, "address" => $user->address])
    </div>

    <div class="{{ $currentStep != 2    ? 'display-none' : '' }}" id="step-2">
        @livewire('user.user-profile-parent',  ['title' => "Etape 2/4 : Informations sur les parents", "user"=> $user])
    </div>

    <div class="{{ $currentStep != 3    ? 'display-none' : '' }}" id="step-3">
        @livewire('user.user-profile-cursus',  ['title' => "Etape 3/4 : Mon cursus", "user"=> $user])
    </div>

    <div class="{{ $currentStep != 4    ? 'display-none' : '' }}" id="step-4">
        @livewire('user.user-profile-detailed-cursus',  ['title' => "Etape 4/4 : Mon cursus détaillé"])
    </div>

    <x-slot name='footer'>
    </x-slot>
</div>
