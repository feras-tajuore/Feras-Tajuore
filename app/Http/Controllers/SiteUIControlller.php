<?php

namespace App\Http\Controllers;

use App\Catogory;
use App\Post;
use Illuminate\Http\Request;

class SiteUIControlller extends Controller
{
    public function index()
    {
        $catogories = Catogory::take(5)->get();
        $first_post = Post::orderBy('created_at','DESC')->first();
        $second_post= Post::orderBy('created_at','DESC')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','DESC')->skip(2)->take(2)->first();

        return view('index',compact( 'catogories','first_post','second_post','third_post'));
    }

    public function show($id)
    {
        // $post = ;
        return view('posts.show')->with('posts', Post::where('id', $id)->first());
    }
}
