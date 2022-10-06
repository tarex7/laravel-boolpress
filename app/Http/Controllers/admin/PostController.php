<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use App\Models\Tag;
use App\Mail\PostPublishedMail;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::select('id','label','color')->get();

        return view('admin.posts.index', compact('posts','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        //$categories = Category::all();
        $tags = Tag::select('id','label')->get();
        $categories = Category::select('id','label')->get();
        $prev_tags = []; 

        return view('admin.posts.create', compact('post','categories','tags','prev_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();

        $post = new Post();

        $post->fill($data);
        $post->user_id = Auth::id();

        //controllo che mi arrivi una chiave image in data
        if(array_key_exists('image', $data)) {

            //se c'è uso Facade Storage con metodo put (dove voglio salvare l'immmagine, /public/post_images)
            $url = Storage::put('post_images', $data['image']); // storage crea un link
            $post->image = $url; //nel database post image = url
        }

        $post->save();

        if(array_key_exists('tags', $data)) {

            $post->tags()->attach($data['tags']);
        }

        //Qui mando la mail
        $mail = new PostPublishedMail(); //creo mail

        $user_email = Auth::user()->email;

        Mail::to($user_email)->send($mail);


      return redirect()->route('admin.posts.index')
      ->with('message','Post creato con successo')
      ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::select('id','label')->get();
        $tags = Tag::select('id','label','color')->get();

        return view('admin.posts.show', compact('post','categories','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::select('id','label')->get();
        $tags = Tag::select('id','label')->get();
        $prev_tags = $post->tags->pluck('id')->toArray(); 

        return view('admin.posts.edit', compact('post','categories','tags','prev_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        

        $post->fill($data);

        if(array_key_exists('image', $data)) {

            if($post->image) Storage::delete($post->image);
            //se c'è uso Facade Storage con metodo put (dove voglio salvare l'immmagine, /public/post_images)
            $url = Storage::put('post_images', $data['image']); // storage crea un link
            $post->image = $url; //nel database post image = url
        }

        $post->update();

      return redirect()->route('admin.posts.show', $post)
      ->with('message','Post modificato con successo')
      ->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if($post->image) Storage::delete($post->image);
        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('message','Il post è stato eliminato correttamente.')
        ->with('type','success');
    }
}
