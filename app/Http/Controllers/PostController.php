<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index' , 'show']);
      
    }


    public function index()
    {
        // $posts = Post::latest()->paginate(9);
        // $posts = Post::latest()->get();
         $posts= Cache::remember('users', now()->addSeconds(30), function(){
            return Post::latest()->get();

         });



        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags'=>Tag::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {



        

        // dd($request);
        $post = Post::create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,

        ]); 

        if(isset($request->tags)){
            foreach ($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        }

        // auth()->user()->notify(new PostCreated($post));
        Notification::send(auth()->user(),new  PostCreated($post) );

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       return view('posts.show' )->with([
        'post'=> $post,
        'recent_posts'=>Post::latest()->get()->except($post->id)->take(5),
        'categories'=>Category::all(),
        'tags'=>Tag::all(),

       ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,

        ]);
        return redirect()->route('posts.index',['post'=>$post->id] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    $post->delete();

    return redirect()->back();
    }


}
