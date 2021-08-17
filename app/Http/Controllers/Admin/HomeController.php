<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $nombres = Post::all()->unique('user_id');
        $cantidad=Post::groupBy('user_id')
        ->where('status',2)
        ->selectRaw('count(*) as total, user_id')
        ->get();


        $posts=Post::latest('visitas')->limit(10)->get();





        return view('admin.index', compact('nombres','cantidad','posts'));
        
    }
}
