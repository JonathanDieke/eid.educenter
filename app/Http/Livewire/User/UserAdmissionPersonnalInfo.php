<?php

namespace App\Http\Livewire\User;

use App\Models\Address;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAdmissionPersonnalInfo extends Component
{
    public $title = "Etape 1/4 : Informations personnelles";
    public $languages ;

    public $user, $userID;

    private $date; 
    public $address ;
    // public $name, $lname, $birthdate, $country, $state, $city, $native_language, $use_language, $gender,  $email ;

    public function mount(){
        $this-> languages = ["french" => "Français", "english" => "Anglais", "spanish" => "Espagnol", "russian" => "Russe"];
        $authUser = Auth::user();

        $this->user = $authUser->toArray();
        
        $this->userID = $this->user["id"];
        $this->address = $authUser->address?->toArray() ; //check if address is null thanks to "?"   
        // dd($this->address);

        $this->date = Carbon::now()->subYears(5);      
    }

    protected function rules(){
        return   [
            // user validation rules
            'user.name' => ['required', 'string', 'max:128'],
            'user.lname' => ['required', 'string', 'max:128'],
            'user.gender' => ['required', 'string', 'max:128', 'in:male,female'],
            'user.birthdate' => ['required', 'date', 'date_format:Y-m-d', "before_or_equal:$this->date"],
            'user.country' => ['required', 'string', 'max:128'],
            'user.state' => ['required', 'string', 'max:128'],
            'user.city' => ['required', 'string', 'max:128'],
            'user.native_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
            'user.use_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
            // // address validation rules 
            'address.address1' => ['nullable', 'string', 'max:128'],
            'address.address2' => ['nullable', 'string', 'max:128'],
            'address.country' => ['nullable', 'string', 'max:128'],
            'address.state' => ['nullable', 'string', 'max:128'],
            'address.city' => ['nullable', 'string', 'max:128'],
            'address.postal_code' => ['nullable', 'string', 'max:128'],
            'address.tel1' => [ 'nullable', 'string', 'max:128'],
            'address.tel2' => [ 'nullable', 'string', 'max:128'],
        ];
    }

    public function saveStep(){ 
        $data = $this->validate();
        
        $user = User::where("id", $this->userID)->first();
        $user->update($data["user"]) ;
        if(isset($user->address)){
            $user->address->update($data['address'] ?? []);
        }else{
            $address = new Address($data['address'] ?? []);
            $address->user()->associate($user);
            $address->save();
        }

    }

    public function nextStep(){
        $this->saveStep();
        $this->emit('setStep', 2);
    }

    public function render()
    {
        return view('livewire.user.user-admission-personnal-info');
    }
}
