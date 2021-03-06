<?php

namespace Nima\Crud\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Nima\Crud\App\Models\Post;
use Nima\Crud\App\Models\User;


class PostController extends Controller {
    private $user;
    
    public function __construct () {
        
        $this->user = User::find(1)->first();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $posts = Post::all ();
//        $posts = Post::has ('user_id' , $this->user['id'])->get ();
        
        
        return view ("Crud::app.posts.showPosts" , ['posts' => $posts]);
//    return view ("Crud::app.showPosts")->withPosts ($posts);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create () {
        return view ('Crud::app.posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request) {
        $data = $request->all ();
        $postId = $data['postId'];
        $title = $data['title'];
        $content = $data['content'];
        
        $post = new Post();
        
        $post->post_id = $postId;
        $post->title = $title;
        $post->content = $content;
        
        $post->save ();
        
//        $newPostId = $post->id;
        
        return view ("Crud::app.app");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id) {
        $posts = Post::find ($id);
//    $post= Post::where("post_id" , $id)->get();

//    var_dump ($posts);
        return view ('Crud::app.posts.showPost' , ['posts' => $posts]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id) {
        $post = Post::find ($id);

//        $this->middleware('can:update,post') ;
        
        return view ("Crud::app.posts.edit" , ["post" => $post]);
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request , $id) {
        $post = Post::find ($id);
        
        if (Gate::denies ('update-post' , $post)) {
            return view ('Crud::app.posts.edit');
        }
        
        
        if (Gate::allows ('update-post' , $post)) {
            $data = $request->all ();
            
            $postId = $data['postId'];
            $title = $data['title'];
            $content = $data['content'];
            
            $post->post_id = $postId;
            $post->title = $title;
            $post->content = $content;
            
            $post->save ();
//    echo "Id : " . $id;
//    echo "<br />Post id : " . $postId;
//    var_dump ($data);
//    dd ($post);
            
            return view ("Crud::app.app");
        } else {
            return view ('Crud::app.posts.edit');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id) {
//    $post = Post::find ($id);
//    $post->delete ();
        
        Post::destroy ($id);
        
        return view ("Crud::app.app");
    }
}
