<?php

namespace App\Http\Livewire\User;

use App\Models\School;
use Livewire\Component;

class UniversityComponent extends Component
{
    public function render()
    {
        $schools = School::all()->sortBy('local_rank');
        return view('livewire.user.university-component', compact('schools'));
    }
}
