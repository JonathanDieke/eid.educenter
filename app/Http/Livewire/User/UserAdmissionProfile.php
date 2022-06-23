<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
// use Vildanbina\LivewireWizard\WizardComponent;

class UserAdmissionProfile extends Component
{
    public $name, $lname, $birthdate, $nativeLanguage, $useLanguage, $nativeCountry, $nativeState, $nativeCity ;
    public $currentStep = 1 ;
    public $successMsg = '';

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function secondStepSubmit()
    {
        // $validatedData = $this->validate([
        //     'status' => 'required',
        // ]);

        $this->currentStep = 2;
    }

    public function setStep($step){
        $this->currentStep = $step ;
    }

    public function editEtablissement(){

    }
    public function render()
    {
        return view('livewire.user.user-admission-profile');
    }

}
