<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserProfileCursus extends Component
{
    public $title = "Etape 3/4 : Mon cursus";
    public function render()
    {
        return view('livewire.user.user-profile-cursus');
    }
}
