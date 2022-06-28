<?php

namespace App\Http\Livewire\User;

use App\Models\Cursus;
use Livewire\Component;

class UserProfileCursus extends Component
{
    public $title = "Etape 3/4 : Mon cursus";
    protected $currentStep = 3 ;

    public $languages, $legalStatusList ;

    public
    $is_living_in_russian
    // $legal_status ,$primary_studies_language ,
    // $secondary_studies_language ,$is_has_russian_college_diploma ,
    // $is_has_russian_high_school_diploma ,$is_study_in_russian_university ,
    // $is_study_in_university
    ;

    public $user, $cursus ;

    public function mount($user){
        // $this->is_living_in_russia = "1" ;
        $this-> languages = ["french" => "Français", "english" => "Anglais", "spanish" => "Espagnol", "russian" => "Russe"];
        $this-> legalStatusList = ["foreign" => "Etranger(ère)", "local" => "Citoyen(ne) russe né(e) en Russie", "permanent_resident" => "Résident(e) permanent(e) en Russie ", "local_foreign" => "Citoyen(ne) russe né(e) en dehors de la Russie"];
        $this->user = $user;
        $this->cursus =  $this->user->cursus ?? ['is_living_in_russia' => 1, 'legal_status' => 'foreign', "primary_studies_language" => "french", "secondary_studies_language" => "french", 'is_has_russian_college_diploma' => 1, 'is_has_russian_high_school_diploma' => 1, 'is_study_in_russian_university' => 1,  'is_study_in_university' => 1, ] ;

    }

    protected function rules(){
        return   [
            // parent validation rules
            'cursus.is_living_in_russian' => ['boolean'],
            'cursus.legal_status' => ['string', 'in:foreign,local,permanent_resident,local_foreign'],
            'cursus.primary_studies_language' => ['string', 'in:french,english, spanish,russian'],
            'cursus.secondary_studies_language' => ['string', 'in:french,english, spanish,russian'],
            'cursus.is_has_russian_college_diploma' => ['boolean'],
            'cursus.is_has_russian_high_school_diploma' => ['boolean'],
            'cursus.is_study_in_russian_university' => ['boolean'],
            'cursus.is_study_in_university' => ['boolean'],
        ];
    }

    public function saveStep(){
        $data = $this->validate();

        if(isset($this->user->cursus)){
            $this->user->cursus->update($this->cursus);
        }else{
            $cursus = new Cursus($this->cursus);
            $cursus->user()->associate($this->user);
        }
    }

    public function backStep(){
        $this->saveStep();
        $this->emit('setStep', $this->currentStep -1);
    }

    public function nextStep(){
        $this->saveStep();
        $this->emit('setStep', $this->currentStep +1);
    }
    public function render()
    {
        return view('livewire.user.user-profile-cursus');
    }
}
