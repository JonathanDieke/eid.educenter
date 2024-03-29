<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class UserInfoComponent extends Component
{
    // public $supportings = [] ;
    public function mount(User $user){
        if($user->role =="admin"){
            return redirect()->route("admin.user.info");
        }
        $this->user = $user  ;
        $this->supportings = []  ;
    }
    public function loadSupporting($userSchoolFormationId){
        // dd( $userSchoolFormationId);
        $this->supportings = $this->user->formations->where('id', $userSchoolFormationId)->first()->supportings ;
    }

    public function export($path){ 
        return Storage::disk('local')->download("supportings/" . $path);
    }
    
    public function render()
    {
        

        return view('livewire.admin.user-info-component',
        ["user" => $this->user, "supportings" => $this->supportings]
        )->layout('layouts.adminLayout');
    }
}
