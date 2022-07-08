<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Translation;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Translations extends Component
{
    use WithPagination ;
    use WithFileUploads;

    protected $listeners = ["refresh" => '$refresh']  ;

    public $currenFileId = 0, $translatedFile ;

    public function mount(){
         
    }

    protected function rules(){
        return [
            'translatedFile' => ["required", "file", 'mimes:pdf'],  
        ];
    }

    public function setCurrentFileID($currentFileId){
        $this->setCurrentFileID = $currentFileId; 
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

        if($this->setCurrentFileID > 0 ){ 
            $filename = $this->getFileName($this->translatedFile->getClientOriginalName()); 

            // dd($filename);

            $path = $this->translatedFile->storeAs('translated', $filename);
            // $this->translation["original_file"] = $path ;

            Translation::where('id', $this->setCurrentFileID)->first()->update(["status" => "success", "translated_file" => $path]);            
        }

        $this->reset(['translatedFile']);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit("refresh");
    }

    public function abortTranslate($translationId){
        Translation::where('id', $translationId)->first()->update(['status' => 'cancelled']);
        $this->emit('refresh');
    }

    public function export($path){
        return Storage::disk('local')->download($path);
    }
    public function render()
    {
        $translations = Translation::where('status', 'pending')->paginate(5);
        return view('livewire.admin.translations', compact('translations'))->layout('layouts.adminLayout');
    }
}
