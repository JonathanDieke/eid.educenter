<?php

namespace App\Http\Livewire;

use App\Models\News as ModelsNews;
use Livewire\Component;
use Livewire\WithPagination;

class NewsComponent extends Component
{
    use WithPagination ;
    public function render()
    {
        $news = ModelsNews::paginate(9);
        return view('livewire.news-component', compact('news'));
    }
}
