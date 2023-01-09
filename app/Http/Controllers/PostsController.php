<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    public function index(){
        $post = DB::table('posts')
            ->select([
                'users.username',
                'posts.user_id',
                'posts.posts',
                'posts.id',
            ])
            ->join('users', function($join){
                $join->on('posts.user_id', '=', 'users.id');
            })
            ->get();
        return view('posts.index', ['posts' => $post]);
    }

    public function create(Request $request){
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'posts' => $post
        ]);

        return back();
    }

    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPosts');
        DB::table('posts')
            ->where('id', $id)
            ->update(['posts' => $up_post]);

        return redirect('/top');
    }

    public function delete($id){
        $post = DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
