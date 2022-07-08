<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Translation;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'translation.original_file.*' => ["required", "file", 'max:1024', 'mimes:pdf'], //1 MB max
            'translation.comment' => ["required", "string", 'max:32', 'min:3'],
        ];
    }

    private function getFileName($filename) : String {
        $fileExt = "." . Str::afterLast($filename, ".");
        $filename = explode($fileExt, $filename);
        unset($filename[count($filename)-1]);
        $filename = implode("-", $filename);
        $filename = now()->getTimestamp() . "_" . Str::slug($filename) . $fileExt;
        return $filename ;
    }

    public function addTranslation(){
        $d = $this->validate();


        foreach ($this->translation['original_file'] as $photo) {
            $filename = $this->getFileName($photo->getClientOriginalName());
            // dd($filename);

            $path = $photo->storeAs('translations', $filename);
            // $this->translation["original_file"] = $path ;

            $t = Translation::create([
                "original_file" => $path,
                "comment" =>$this->translation['comment'],
             ]);
            $t->user()->associate(Auth::user());
            $t->save();

        }

        $this->reset(['translation']);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit("refresh");
    }

    public function export($path){
        return Storage::disk('local')->download($path);
    }
    public function render()
    {
        $translations = $this->user->translations ;
        return view('livewire.user.user-translate-legalize-component', compact('translations'));
    }
}
