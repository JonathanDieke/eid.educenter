<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserInfoComponent extends Component
{
    public function mount(User $user){
        // dd($user);
        $this->user = $user->only(['name', 'lname']) ;
    }
    public function render()
    {
        return view('livewire.admin.user-info-component', ["user" => $this->user])->layout('layouts.adminLayout');
    }
}
