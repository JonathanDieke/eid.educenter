<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserProfileDetailedCursus extends Component
{
    public $title = "Etape 4/4 : Mon cursus détaillé";
    public function render()
    {
        return view('livewire.user.user-profile-detailed-cursus');
    }
}
