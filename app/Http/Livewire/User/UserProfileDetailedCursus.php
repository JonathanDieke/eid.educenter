<?php

namespace App\Http\Livewire\User;

use App\Models\Country;
use Livewire\Component;
use App\Models\Supporting;
use Illuminate\Support\Arr;
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
    public $user_school_formation;
    public  $countries = [], $states = [];
    public $supporting ;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($user){
        $this->user = $user;
    }

    protected function getUserSchoolFormationRules(){
        return   [
            // user school validation rules
            'user_school_formation.name' => ['required', 'string', 'min:3', "max:128"],
            'user_school_formation.country' => ['required', 'integer'],
            'user_school_formation.state' => ['required', 'integer'],
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

        if($userSchoolFormation = UserSchoolFormation::find($this->currentFormationId)){
            $userSchoolFormation->update([$this->user_school_formation]);
        }else{
            $user_school_formation = new UserSchoolFormation($this->user_school_formation);
            $user_school_formation->user()->associate($this->user);
            $user_school_formation->save();
        }

        $this->reset(["user_school_formation"]);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit('refresh');
    }

    public function deleteUserSchoolFormation($formationId){
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
            'supporting.file' => ['required', 'file', 'max:1024', 'mimes:jpg,png,jpeg,pdf'], // 1MB Max
            'supporting.comment' => ['required', 'string', 'max:32', 'min:3'],
        ]);

        $filename = $this->supporting['file']->getClientOriginalName();
        $fileExt = "." . Str::afterLast($filename, ".");
        $filename = explode($fileExt, $filename);
        unset($filename[count($filename)-1]);
        $filename = implode("-", $filename);
        $filename = now()->getTimestamp() . "_" . Str::slug($filename) . $fileExt;

        $path = $this->supporting["file"]->storeAs('supportings', $filename);

        $this->supporting["filename"] = $path ;
        unset($this->supporting["file"]);

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
    public function setCountries(){
        $this->countries = Country::all();
    }

    public function updatedUserSchoolFormationCountry($propertyValue, $propertyName){
        $this->user_school_formation['state'] = "";
        $this->states = Country::where('id', $propertyValue)->first()->states ;
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
