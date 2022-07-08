<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Translation;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Translations extends Component
{
    use WithPagination ;

    public function export($path){
        return Storage::disk('local')->download($path);
    }
    public function render()
    {
        $translations = Translation::paginate(5);
        return view('livewire.admin.translations', compact('translations'))->layout('layouts.adminLayout');
    }
}
