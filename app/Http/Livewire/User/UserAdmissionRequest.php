<?php

namespace App\Http\Livewire\User;

use App\Models\AdmissionRequest;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserAdmissionRequest extends Component
{
    public $user, $admission_request, $admission_requests;
    public function mount(){
        $this->user = Auth::user() ;
        // $this->admission_requests  = $this->user->admissionRequest  ;
        $this->admission_request  = []  ;
        $this->programs  = []  ;
    }

    protected function getAdmissionRequestRules(){
        return   [
            // user schools validation rules
            'admission_request.school_id' => ['required', 'integer', 'min:1'],
            'admission_request.program_id' => ['required', 'string', 'min:1'],
            'admission_request.session' => ['required', 'string', 'min:3', 'in:autumn,winter,summer'],
            'admission_request.cycle' => ['required', 'string', 'min:3', 'in:first,second,third'],
        ];
    }

    public function updatedAdmissionRequest($value, $key){ ;
        if($key == "school_id"){
            $this->programs = School::where("id", $value)->first()->programs->sortBy("libel") ;
        }
    }

    public function createAdmissionRequest(){
        // dd('createAdmissionRequest');
        $d = $this->validate($this->getAdmissionRequestRules()) ;

        // dd($d);

        $admissionRequest = new AdmissionRequest($this->admission_request);
        $admissionRequest->user()->associate($this->user);
        $admissionRequest->save();

        // $this->reset(["admission_request"]);


        $this->dispatchBrowserEvent("closeModal");
    }

    public function deleteAdmissionRequest($admissionRequestId){
        AdmissionRequest::destroy($admissionRequestId);

        // $this->admission_requests->filter(function($item, $value) use($admissionRequestId){
        //     return $item->id != $admissionRequestId ;
        // });
    }


    public function render()
    {
        $schools = School::all()->sortBy("name");
        $admissionRequests = Auth::user()->admissionRequest;

        return view('livewire.user.user-admission-request', compact('schools', 'admissionRequests'));
    }
}
