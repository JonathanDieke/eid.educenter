<?php

namespace App\Http\Livewire\User;

use App\Models\Supporting;
use Livewire\Component;
use App\Models\UserSchool;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\UserSchoolFormation;

class UserProfileDetailedCursus extends Component
{
    use WithFileUploads;

    public $title = "Etape 4/4 : Mon cursus détaillé";
    protected $currentStep = 4, $renderSupportings = false;


    public  $user;
    public $currentSchoolName, $currentFormationId ;
    public $user_school_formation ;
    public $supporting ;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($user){
        $this->user = $user;
    }

    protected function getUserSchoolFormationRules(){
        return   [
            // user school validation rules
            'user_school_formation.name' => ['required', 'string', 'min:3', "max:128"],
            'user_school_formation.country' => ['required', 'string', 'min:3', "max:128"],
            'user_school_formation.state' => ['required', 'string', 'min:3', "max:128"],
            // user school formation validation rules
            'user_school_formation.type' => ['required', 'string', 'min:3', 'max:128'],
            'user_school_formation.program_name' => ['required', 'string', 'min:3', 'max:128'],
            'user_school_formation.status' => ['required', 'string', 'in:abandoned,in_progress,terminated', 'max:15'],
            'user_school_formation.start_date' => ['required', 'date'],
            'user_school_formation.end_date' => ['required', 'date'],
        ];
    }

    public function addUserSchoolFormation(){
        $this->validate($this->getUserSchoolFormationRules()) ;

        $this->user_school_formation["name"] = Str::title($this->user_school_formation["name"]);
        unset($this->user_school_formation["id"]);
        // dd($this->currentFormationId );

        $user_school_formation = UserSchoolFormation::updateOrCreate(
            ["id" => $this->currentFormationId],
            $this->user_school_formation);
        $user_school_formation->user()->associate($this->user);
        $user_school_formation->save();

        $this->reset(["user_school_formation"]);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit('refresh');
    }

    public function deleteUserSchoolFormation($formationId){
        // dd($userSchoolId);
        UserSchoolFormation::destroy($formationId);
        $this->emit('refresh');
    }

    public function setCurrentFormation($currentFormationId, $currentFormationName, $action){
        $this->supporting = [];
        $this->currentSchoolName = $currentFormationName ;
        $this->currentFormationId = $currentFormationId ;
        $this->renderSupportings = $action == 'show'  ? true : false ;
    }

    // Edition de la formation
    public function setUserSchoolFormation($formationId){
        $this->user_school_formation = UserSchoolFormation::find($formationId)->toArray();
        $this-> currentFormationId = $formationId ;
        // dd($this->user_school_formation );
    }

    public function addSupporting(){
        $d = $this->validate([
            'supporting.filename' => ['file', 'max:1024', 'mimes:jpg,png,jpeg,pdf'], // 1MB Max
            'supporting.comment' => ['required', 'string', 'max:32'],
        ]);

        $path = $this->supporting["filename"]->store('supportings');
        $this->supporting["filename"] = $path ;

        $s = new Supporting($this->supporting);
        $s->formation()->associate($this->currentFormationId);
        $s->save();

        $this->reset(["supporting"]);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit('refresh');
    }

    public function deleteSupporting($supportingId){
        Supporting::destroy($supportingId);

        $this->reset(["currentFormationId"]);
        $this->dispatchBrowserEvent("closeModal");
    }

    public function backStep(){
        $this->emit('setStep', $this->currentStep -1);
    }
    public function submitForm(){

    }
    public function render()
    {
        $formations = $this->user->formations->sortBy('name');
        $supportings = $this->currentFormationId ?  $formations->where("id", $this->currentFormationId)->first()->supportings : [] ;
        return view('livewire.user.user-profile-detailed-cursus', [
            'formations' => $formations,
            "supportings" => $supportings
        ]);
    }
}



    // protected function getUserSchoolRules(){
    //     return   [
    //         // user schools validation rules
    //         'user_school.name' => ['required', 'string', 'min:3', 'max:128'],
    //         'user_school.country' => ['required', 'string', 'min:3', 'max:128'],
    //         'user_school.state' => ['required', 'string', 'min:3', 'max:128'],
    //     ];
    // }

    // public function addUserSchool(){
    //     $data  = $this->validate($this->getUserSchoolRules()) ;
    //     // dd($data);
    //     $user_school = new UserSchool($this->user_school);
    //     $user_school->user()->associate($this->user);
    //     $user_school->save();
    //     $this->reset(["user_school"]);
    //     $this->dispatchBrowserEvent("closeModal");
    //     $this->emit('refresh');
    // }
