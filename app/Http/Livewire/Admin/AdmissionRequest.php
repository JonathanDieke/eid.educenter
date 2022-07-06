<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AdmissionRequest as ModelsAdmissionRequest;

class AdmissionRequest extends Component
{
    use WithPagination;
    public function render()
    {
        $admissionRequests = ModelsAdmissionRequest::paginate(5);
        return view('livewire.admin.admission-request', compact('admissionRequests'))->layout('layouts.adminLayout');
    }
}
