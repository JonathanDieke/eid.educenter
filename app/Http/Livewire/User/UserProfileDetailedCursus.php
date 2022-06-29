<?php

namespace App\Http\Livewire\User;

use App\Models\UserSchool;
use App\Models\UserSchoolFormation;
use Livewire\Component;

class UserProfileDetailedCursus extends Component
{
    public $title = "Etape 4/4 : Mon cursus détaillé";
    protected $currentStep;
    public $user_schools, $user_school , $user;
    public $user_school_currentName, $user_school_currentID ;
    public $user_school_formation, $user_school_currentFormations  ;


    public function mount($user){
        $this->currentStep = 4;
        $this->user_school_currentFormations = [] ;
        $this->user = $user;
        echo "je suis mount()";
        $this->user_schools = !empty($user->attend->toArray()) ? $user->attend : []  ;
        $this->user_school = ["name" => "Estia", "country" => "", "state" => ""];
    }

    protected function getUserSchoolRules(){
        return   [
            // user schools validation rules
            'user_school.name' => ['required', 'string', 'min:3', 'max:128'],
            'user_school.country' => ['required', 'string', 'min:3', 'max:128'],
            'user_school.state' => ['required', 'string', 'min:3', 'max:128'],
        ];
    }
    protected function getUserSchoolFormationRules(){
        return   [
            // user school formation validation rules
            'user_school_formation.type' => ['required', 'string', 'min:3', 'max:128'],
            'user_school_formation.program_name' => ['required', 'string', 'min:3', 'max:128'],
            'user_school_formation.status' => ['required', 'string', 'in:abandoned,in_progress,terminated', 'max:15'],
            'user_school_formation.start_date' => ['required', 'date'],
            'user_school_formation.end_date' => ['required', 'date'],
        ];
    }

    public function setUserSchoolFormation($user_school_currentID, $user_school_currentName, $action){
        // dd($user_school_currentID, $user_school_currentName);
        $this->user_school_currentName = $user_school_currentName;
        $this->user_school_currentID = $user_school_currentID ;

        if($action === 'add'){
            $this->user_school_formation = ["type" => "", "program_name" => "", "status" => "", "start_date" => "", "end_date" => ""];
        }
        if($action === 'show'){
            $this->user_school_currentFormations = $this->user->attend->where('id', $user_school_currentID)->first()->formations ;
        }
        // $this->user_schools = !empty($this->user->attend->formations->toArray()) ?
        //                                     $this->user->attend->formations :
        //                                     ["type" => "", "program_name" => "", "status" => "", "start_date" => "", "end_date" => ""]  ;
    }

    public function addUserSchool(){
        $data  = $this->validate($this->getUserSchoolRules()) ;
        // dd($data);
        $user_school = new UserSchool($this->user_school);
        $user_school->user()->associate($this->user);
        $user_school->save();
        $this->reset(["user_school"]);
        $this->dispatchBrowserEvent("closeModal");
    }

    public function addUserSchoolFormation(){
        $data  = $this->validate($this->getUserSchoolFormationRules()) ;
        // dd($data);
        $user_school_formation = new UserSchoolFormation($this->user_school_formation);
        $user_school_formation->userSchool()->associate($this->user_school_currentID);
        $user_school_formation->save();
        $this->user_schools =  $this->user->attend ;
        $this->reset(["user_school_formation", "user_school_currentID", "user_school_currentName"]);
        $this->dispatchBrowserEvent("closeModal");
    }

    public function backStep(){
        $this->saveStep();
        $this->emit('setStep', $this->currentStep -1);
    }

    public function submitForm(){
        $this->saveStep();
    }
    public function render()
    {
        return view('livewire.user.user-profile-detailed-cursus');
    }
}
