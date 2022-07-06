<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\State;
use App\Models\Address;
use App\Models\Country;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAdmissionPersonnalInfo extends Component
{
    public $title = "Etape 1/4 : Informations personnelles";
    public $languages ;
    public $currentStep;

    public $userStates = [], $userCities = [] ;
    public $addressStates = [], $addressCities = [] ;
    public $user, $userID;

    private $date;
    public $address ;

    public function mount($user, $address){
        $this-> languages = ["french" => "Français", "english" => "Anglais", "spanish" => "Espagnol", "russian" => "Russe"];
        $this->currentStep = 1;

        $this->userStates = Country::where("id", $user->country)->first()->states;
        $this->userCities = State::where("id", $user->state)->first()->cities;

        if($address){
            $this->addressStates = Country::where("id", $address->country)->first()->states;
            $this->addressCities = State::where("id", $address->state)->first()->cities;
        }

        $this->user = $user->toArray();
        $this->userID = $this->user["id"];

        $this->address = $address?->toArray() ; //check if address is null thanks to "?"

        // dd($this->address);

        $this->date = Carbon::now()->subYears(5);
    }

    public function updatedUserCountry($propertyValue, $propertyName){
        $this->user['state'] = "";
        $this->user['city'] = "";
        $this->userStates = Country::where('id', $propertyValue)->first()->states ;
    }
    public function updatedUserState($propertyValue, $propertyName){
        $this->user['city'] = "";
        $this->userCities = Country::where('id', $this->user['country'])->first()->states->where('id', $propertyValue)->first()->cities ;
    }

    public function updatedAddressCountry($propertyValue, $propertyName){
        $this->address['state'] = "";
        $this->address['city'] = "";
        $this->addressStates = Country::where('id', $propertyValue)->first()->states ;
    }
    public function updatedAddressState($propertyValue, $propertyName){
        $this->address['city'] = "";
        $this->addressCities = Country::where('id', $this->address['country'])->first()->states->where('id', $propertyValue)->first()->cities ;
    }

    protected function rules(){
        return   [
            // user validation rules
            'user.name' => ['required', 'string', 'max:128'],
            'user.lname' => ['required', 'string', 'max:128'],
            'user.gender' => ['required', 'string', 'max:128', 'in:male,female'],
            'user.birthdate' => ['required', 'date', 'date_format:Y-m-d', "before_or_equal:$this->date"],
            'user.country' => ['required', 'integer'],
            'user.state' => ['required', 'integer'],
            'user.city' => ['required', 'integer'],
            'user.native_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
            'user.use_language' => ['required', 'string', 'max:128', 'in:french,english,spanish, russian'],
            // address validation rules
            'address.address1' => ['nullable', 'string', 'max:128'],
            'address.address2' => ['nullable', 'string', 'max:128'],
            'address.country' => ['nullable', 'integer'],
            'address.state' => ['nullable', 'integer'],
            'address.city' => ['nullable', 'integer'],
            'address.postal_code' => ['nullable', 'string', 'max:128'],
            'address.tel1' => [ 'nullable', 'string', 'max:128'],
            'address.tel2' => [ 'nullable', 'string', 'max:128'],
        ];
    }

    public function saveStep(){
        $data = $this->validate();
        // dd($data);

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
        // dd();
        $this->emit('setStep', $this->currentStep +1 );
    }

    public function render()
    {
        $countries = Country::all();
        return view('livewire.user.user-admission-personnal-info', compact('countries'));
    }
}
