<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\POST;
use Auth;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->first();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(Request $request){
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'posts' => $post
        ]);

        return back();
    }
}
