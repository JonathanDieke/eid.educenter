<?php

namespace App\Http\Livewire\User;

use App\Models\TheParent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileParent extends Component
{
    public $title = "Etape 2/4 : Informations sur les parents";
    public $user ;

    public $the_parent1_link, $the_parent1_name, $the_parent1_lname;
    public $the_parent2_link, $the_parent2_name, $the_parent2_lname;

    public $currentStep;

    public function mount($user){
        $this->currentStep = 2;

        $this->user = $user;

        [$this->theParent1, $this->theParent2] = !empty($this->user->theParents->toArray()) ? $this->user->theParents->toArray() :  [['link' => 'father'], ['link' => 'mother']] ;
    }

    public function updated($name, $val){
        // dd($this->$name);
    }

    protected function rules(){
        return   [
            // parent validation rules
            'theParent1.link' => ['string', 'max:10', 'in:father,mother'],
            'theParent1.name' => ['string', 'max:128', 'min:3'],
            'theParent1.lname' => ['string', 'max:128', 'min:3'],
            'theParent2.link' => ['string', 'max:10', 'in:father,mother'],
            'theParent2.name' => ['string', 'max:128', 'min:3'],
            'theParent2.lname' => ['string', 'max:128', 'min:3'],
        ];
    }

    public function saveStep(){
        $this->validate();

        // dd($this->theParent1, $this->theParent2);

        if($this->user->theParents->toArray() != []){
            $this->user->theParents[0]->update($this->theParent1);
            $this->user->theParents[1]->update($this->theParent2);
        }else{
            $theParent1 = new TheParent($this->theParent1);
            $theParent2 = new TheParent($this->theParent2);
            $theParent1->user()->associate($this->user);
            $theParent2->user()->associate($this->user);
            $theParent1->save();
            $theParent2->save();
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
    public function render(){
        return view('livewire.user.user-profile-parent');
    }
}
