<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserAdmissionPersonnalInfo extends Component
{
    public $title = "Etape 1/4 : Informations personnelles";
    public function render()
    {
        return view('livewire.user.user-admission-personnal-info');
    }
}
