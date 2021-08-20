<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        

       /*          $cantidad=Post::where('status','=','2')
                ->select('user_id',Post::raw('count(user_id) as cantidad'))
                ->groupBy('user_id')
                ->select('user_id',User::pluck('name'))
                ->get();  */
             

                $cantidad=Post::join("users", "users.id", "=", "posts.user_id")
                                ->select("users.id","users.name","posts.user_id",Post::raw("count(posts.user_id) as cantidad"))
                                ->where("posts.status","=","2")
                                ->groupBy("users.id")
                                ->get();

                

        $posts=Post::latest('visitas')->limit(10)->get();





        return view('admin.index', compact('cantidad','posts'));
        
    }
}
