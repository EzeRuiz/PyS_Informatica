<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\PostaRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostaController extends Controller
{

    public function __construct()
    {
       $this->Middleware('can:admin.postsa.index')->only('index');
       $this->Middleware('can:admin.postsa.edit')->only('edit', 'update');
       $this->Middleware('can:admin.postsa.destroy')->only('destroy');
    }  
   
    public function index()
    {
        return view('admin.postsa.index');
    }

   

       public function edit(Post $postsa )
    {
            
    
        $categories = Category::pluck('name','id');
        $tags =  Tag::all();

        return view('admin.postsa.edit', compact( 'postsa', 'categories', 'tags'));
    }

    public function update(PostaRequest $request, Post $postsa)
    {
       $postsa->update($request->all());
       if($request->file('file')){
           $url = Storage::put('posts', $request->file('file'));
          
           if($postsa->image){
               Storage::delete($postsa->image->url);

               $postsa->image->update([
                   'url' => $url
               ]);
            }else{
                $postsa->image()->create([
                    'url' => $url
                ]);
           }
       }
       if($request->tags){
        $postsa->tags()->sync($request->tags);  
      };
       return redirect()->route('admin.postsa.edit', $postsa)->with('info', 'El post se actualizó con éxito');
    }


    public function destroy(Post $postsa)
    {
     
        $postsa->delete();

       return redirect()->route('admin.postsa.index', $postsa)->with('info', 'El post se eliminó con éxito');
    }
}