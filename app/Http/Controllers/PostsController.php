<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function create(Request $request){
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'posts' => $request->posts
        ]);

        return back();
    }
}
