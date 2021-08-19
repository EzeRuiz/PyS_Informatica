<x-app-layout>
    <div class="container py-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
            
                <style>
                    .container-1 input#search{
                        
                        height: 50px;
                        background: #2b303b;
                        border: none;
                        font-size: 10pt;
                        float: left;
                        color: #63717f;
                        padding-left: 45px;
                        -webkit-border-radius: 5px;
                        -moz-border-radius: 5px;
                        border-radius: 5px;
                        -webkit-transition: background .55s ease;
                        -moz-transition: background .55s ease;
                        -ms-transition: background .55s ease;
                        -o-transition: background .55s ease;
                        transition: background .55s ease;
                        }
                        .container-1 input#search::-webkit-input-placeholder {
                        color: #65737e;
                        }
                        
                        .container-1 input#search:-moz-placeholder { /* Firefox 18- */
                        color: #65737e;  
                        }
                        
                        .container-1 input#search::-moz-placeholder {  /* Firefox 19+ */
                        color: #65737e;  
                        }
                        
                        .container-1 input#search:-ms-input-placeholder {  
                        color: #65737e;  
                        }
                        .container-1 .icon{
                        position: absolute;
                        top: 50%;
                        margin-left: 17px;
                        margin-top: 17px;
                        z-index: 1;
                        color: #4f5b66;
                        }
                        .container-1 input#search:hover, .container-1 input#search:focus, .container-1 input#search:active{
                            outline:none;
                            background: #ffffff;
                        }
  
                </style>
                
{{--                 <div class="box w-full col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="container-1 w-full">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search"  wire:model="search" class="w-full" id="search" placeholder="Buscar..." />
                    </div>
                </div> --}}
            
            @foreach ($posts as $post)
                <article class="w-full h-80 rounded-lg shadow-lg bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/11/14/13/29/tidal-5741708_960_720.jpg @endif)">
                           <div class="w-full h-full px-8 flex flex-col justify-center">
                                <div>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{route('posts.tag', $tag)}}" class="inlne-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>    
                                    @endforeach
                               
                                </div>
                                                                
                                <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                                    <a href="{{route('posts.show', $post)}}">
                                        {{$post->name}}
                                    </a>
                                </h1>    
                                <h3 class="text-1xl text-white leading-8 font-bold mt-2">
                                    <a href="{{route('posts.autor', $post)}}">
                                        {{$post->user->name}}
                                    </a>
                                </h3>  
                           </div> 
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>



</x-app-layout>