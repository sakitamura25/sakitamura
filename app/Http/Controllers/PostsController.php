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

        $posts = DB::table('posts')
            ->select([
                'users.id as uid',
                'users.username',
                'users.images',
                'posts.id as pid',
                'posts.user_id',
                'posts.posts',
                'posts.created_at',
                'posts.updated_at',
                'follows.follow',
                'follows.follower',
            ])
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('follows.follower', Auth::id())
            ->orWhere('posts.user_id', Auth::id())
            ->orderBy('posts.updated_at', 'desc')
            ->get()
            ->unique('pid');

            return view('posts.index', compact('posts'));

    }

    public function create(Request $request){
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'posts' => $post,
            'created_at' => now(),
            'updated_at' => now()
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

    public function profile(){
        $user = Auth::user();
        return view('posts.profile', ['user' => $user]);
    }

    public function profileUpdate(Request $request){

        $request->validate([
            'username' => 'required|between:4,12',
            'mail' => 'required|email|between:4,12|unique:users',
            'password' => 'required|alpha_num|between:4,12|unique:users',
            'bio' => 'max:200',
        ]);

        $user = Auth::user();
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = bcrypt($request->input('password'));
        $user->bio = $request->input('bio');
        // $user->images = $request->file('images')->store('public/images');
        $user->save();

        return view('posts.profile', compact('user'));

    }
}
