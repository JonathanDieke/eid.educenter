<?php

namespace App\Http\Livewire\Admin;

use App\Models\Translation;
use Livewire\Component;
use Livewire\WithPagination;

class Translations extends Component
{
    use WithPagination ;
    public function render()
    {
        $translations = Translation::paginate(5);
        return view('livewire.admin.translations', compact('translations'))->layout('layouts.adminLayout');
    }
}
