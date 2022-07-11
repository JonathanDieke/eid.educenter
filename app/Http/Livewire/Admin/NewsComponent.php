<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use App\Models\NewsImage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class NewsComponent extends Component
{
    use WithPagination ;
    use WithFileUploads;

    protected $listeners = ["refresh" => '$refresh', 'deleteNews', 'getDate'];
    public $createNews = [] ;

    public function mount(){
        // $this->createNews = [];
    }

    public function getDate($value){
        $this->createNews['news_date'] = $value ;
    }

    public function rules(){
        return [
            "createNews.title" => ['required', 'string', 'min:3', 'max:128'],
            "createNews.news_date" => ['required', 'date'],
            "createNews.abstract" => ['required', 'string', 'min:3', 'max:128'],
            "createNews.description" => ['required', 'string', 'min:3'],
            "createNews.images.*" => ['required', 'file', 'mimes:png,jpg,jpeg'],
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

    public function save(){
        $d = $this->validate();
        // dd(collect($this->createNews)->except(['images'])->toArray());
        $news = News::create(collect($this->createNews)->except(['images'])->toArray());
        $news->save();

        foreach ($this->createNews['images'] as $image) {
            $filename = $this->getFileName($image->getClientOriginalName());

            $path = $image->storeAs('news_images', $filename, $disk = 'public') ;

            // dd("ok");
            $n_i = NewsImage::create([
                "image" => $path,
                "news_id" => $news->id
             ]);

            // $n_i->news()->associae($news->id);
            $n_i->save();

        }

        $this->reset(['createNews']);
        $this->dispatchBrowserEvent("closeModal");
        $this->emit("refresh");
    }

    public function deleteNews($newsId){
        News::destroy($newsId);
        $this->emit("refresh");
    }


    public function render()
    {
        $news = News::paginate(5);
        return view('livewire.admin.news-component', compact('news'))->layout('layouts.adminLayout');
    }
}
