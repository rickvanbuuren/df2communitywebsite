<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        if(Auth::guest())
        {
            $posts = Post::orderBy('created_at', 'desc')->where('hidden', 'false')->get();
        }else{
            $user_role = auth()->user()->role;

            if($user_role == "admin"){
                $posts = Post::orderBy('created_at', 'desc')->get();
            }else{
                $posts = Post::orderBy('created_at', 'desc')->where('hidden', 'false')->get();
            }
        }

        if ($request->has('category')) {
            $category = $request->get('category');

            if(Auth::guest())
            {
                $posts = Post::orderBy('created_at', 'desc')->where('hidden', 'false')->where('category', $category)->get();
            }else{
                $user_role = auth()->user()->role;

                if($user_role == "admin"){
                    $posts = Post::orderBy('created_at', 'desc')->where('category', $category)->get();
                }else{
                    $posts = Post::orderBy('created_at', 'desc')->where('hidden', 'false')->where('category', $category)->get();
                }
            }

            return view('posts.index')->with('posts', $posts);
        }

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'hide' => 'required',
        ]);

        //Handle file upload
        if($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName. '_' .time(). '.' .$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->hidden = $request->input('hide');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user_role = auth()->user()->role;

        //check for correct user and user role is not admin
        if(auth()->user()->id !== $post->user_id && $user_role !== 'admin'){
            return redirect('/posts')->with('error', "Unauthorized Page");
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'hide' => 'required',
        ]);


        $post = Post::find($id);
        //Handle file upload
        if($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName. '_' .time(). '.' .$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            if($post->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }

        //create post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        $post->hidden = $request->input('hide');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $user_role = auth()->user()->role;

        //check for correct user and user role is not admin
        if(auth()->user()->id !== $post->user_id && $user_role !== 'admin'){
            return redirect('/posts')->with('error', "Unauthorized Page");
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
