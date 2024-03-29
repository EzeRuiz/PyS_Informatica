<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{


    public function __construct()
    {
       $this->Middleware('can:admin.posts.index')->only('index');
       $this->Middleware('can:admin.posts.create')->only('create', 'store');
       $this->Middleware('can:admin.posts.edit')->only('edit', 'update');
       $this->Middleware('can:admin.posts.destroy')->only('destroy');
    }
  
    public function index()
    {
        return view('admin.posts.index');
    }


    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags =  Tag::all();
       
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(PostRequest $request)
    {   
 

    $post = Post::create($request->all());
      
       if( $request->file('file')){
           $url = Storage::put('posts', $request->file('file'));
           $post->image()->create([
               'url' => $url
           ]);
       }

        if($request->tags){
          $post->tags()->attach($request->tags);  
        };
        return redirect()->route('admin.posts.edit',$post)->with('info', 'La publicacion se creo con éxito');;
    } 


       public function edit(Post $post)
    {
        $this->authorize('author', $post);
        
        
        $categories = Category::pluck('name','id');
        $tags =  Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
       $post->update($request->all());
       if($request->file('file')){
           $url = Storage::put('posts', $request->file('file'));
          
           if($post->image){
               Storage::delete($post->image->url);

               $post->image->update([
                   'url' => $url
               ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
           }
       }
       if($request->tags){
        $post->tags()->sync($request->tags);  
      };
       return redirect()->route('admin.posts.edit', $post)->with('info', 'La publicacion se actualizó con éxito');
    }


    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

       return redirect()->route('admin.posts.index', $post)->with('info', 'La publicacion se eliminó con éxito');
    }
}
