<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination;

    public $listeners = ["refresh" => '$refresh', "deleteUser"] ;

    public function deleteUser($userId){
        User::destroy($userId);
        $this->emit("refresh");
    }
    public function render()
    {
        $users = User::select(['id', "name", "lname", 'email', 'country', 'city'])->where('role', '<>','admin')->paginate(5);
        return view('livewire.admin.users-component', compact('users'))->layout('layouts.adminLayout');
    }
}
