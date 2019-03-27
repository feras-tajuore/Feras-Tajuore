<?php

namespace App\Http\Controllers;

use App\Catogory;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts' , Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catogories = Catogory::all();
        $tags = Tag::all();

        if($catogories->count() == 0)
            return redirect()->route('catogory.create');

        if($tags->count() == 0)
            return redirect()->route('tag.create');

        return view('posts.create')->with('catogories' , $catogories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'title'   => 'required|min:3',
            'content' => 'required',
            'catogory_id' => 'required',
            'photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $photo = $request->photo;
        $photoName = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts', $photoName);

        $post = Post::create([
                'title'   => $request->title,
                'content' => $request->content,
                'catogory_id' => $request->catogory_id,
                'photo'   => 'uploads/posts/'.$photoName
            ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('post.index');

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
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'))->with('catogories', Catogory::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(post $post)
    {
        $attrbute = request()->validate([
             'title'   => 'required|min:3',
            'content' => 'required',
            'catogory_id' => 'required'
        ]);

        if(request()->hasFile('photo'))
        {
            $photo = request()->photo;
            $photoName = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts', $photoName);

            $post->photo = 'uploads/posts/'. $photoName;
        }

        $post->update($attrbute);

        return redirect()->route('post.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }

    /**
     * Show Soft Deleted the specified resource from storage.
     * 
     * @return void
     */
    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        return view('posts.softDeleted')->with('posts',$post);
    }

    /**
     * Restore Soft Deleted the specified resource from storage.
     * 
     * @param $id
     * @return void
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('post.index');
    }

    /**
     * Delete Hard Soft Deleted the specified resource from storage.
     * 
     * @param $id
     * @return void
     */
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
}
