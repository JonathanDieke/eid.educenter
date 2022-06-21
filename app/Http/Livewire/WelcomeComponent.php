<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class WelcomeComponent extends Component
{
    public $name;
    public $email;
    public  $password;
    public $password_confirmation ;

    public function mount(){
        $this->name = "jojo";
        $this->email = "jojo3@jojo.ci";
        $this->password = "LenerfdelaGuerre2@";
        $this->password_confirmation = "LenerfdelaGuerre2@";
    }

    protected function rules(){
        return   [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function register(){

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(){
        
    }
    public function render()
    {
        return view('livewire.welcome-component');
    }
}
