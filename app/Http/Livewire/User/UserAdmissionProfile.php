<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserAdmissionProfile extends Component
{
    public $user ;
    public $currentStep = 3 ;
    public $successMsg = '';

    protected function getListeners(){
        return ['setStep' => 'setStep'];
    }

    public function mount(){
        $this->user = Auth::user();
    }
    public function setStep($step){
        $this->currentStep = $step ;
    }

    public function render()
    {
        return view('livewire.user.user-admission-profile');
    }

    // public function back($step)
    // {
    //     $this->currentStep = $step;
    // }

    // public function secondStepSubmit()
    // {
    //     // $validatedData = $this->validate([
    //     //     'status' => 'required',
    //     // ]);

    //     $this->currentStep = 2;
    // }

}
