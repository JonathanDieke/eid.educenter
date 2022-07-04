<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Translation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserTranslateLegalizeComponent extends Component
{
    use WithFileUploads;

    public $user ;
    public $translation ;
    protected $listeners = ['refresh' => '$refresh'];

    public function mount(){
        $this->user = Auth::user();
    }

    protected function rules(){
        return [
            'translation.original_file' => ["required", "file", 'max:1024', 'mimes:pdf'], //1 MB max
            'translation.comment' => ["required", "string", 'max:32', 'min:3'],
        ];
    }

    public function addTranslation(){
        $d = $this->validate();

        // dd($d);

        $path = $this->translation["original_file"]->store('translations');
        $this->translation["original_file"] = $path ;

        $t = Translation::create($this->translation);
        $t->user()->associate(Auth::user());
        $t->save();

        $this->reset(['translation']);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit("refresh");
    }
    public function render()
    {
        $translations = $this->user->translations ;
        return view('livewire.user.user-translate-legalize-component', compact('translations'));
    }
}
