<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
                            //'user_id', auth()->user()->id
        $posts = Post::where('status', 2)
                    ->where('name','LIKE', '%' . $this->search . '%')            
                    ->latest('id')
                    ->paginate();
        return view('livewire.admin.postsa-index', compact('posts'));
    }
}
