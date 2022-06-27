<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserProfileParent extends Component
{
    public $title = "Etape 2/4 : Informations sur les parents";
    public function render()
    {
        return view('livewire.user.user-profile-parent');
    }
}
