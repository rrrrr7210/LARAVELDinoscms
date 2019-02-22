<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user_id = \Auth::user()->id;
       $input = $request->all();
       if ($file = $request->file('file')){
           $name = time() . $file->getClientOriginalName();
           $file->move('images', $name);
           $photo = Image::create(['image_name' => '/images/'.$name]);
           $input['image_id'] = $photo->id;
           $input['user_id'] = $user_id;
       }
       Post::create($input);
        return redirect('/home')->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('file')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Image::create(['image_name' => '/images/'.$name]);
            $input['image_id'] = $photo->id;
        }
        $post->update($input);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image != 0) {
            unlink(public_path() . $post->image->image_name);
        }
        $post->delete();
        return redirect()->back();
    }
}
