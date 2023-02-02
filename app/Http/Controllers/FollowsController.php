<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{

    public function followList(){
        $follow_lists = DB::table('follows')
            ->select([
                'follows.follow',
                'follows.follower',
                'users.id',
                'users.images',
            ])
            ->join('users', 'follows.follow', '=', 'users.id')
            ->where('follower', Auth::id())
            ->get();

        $follow_posts = DB::table('posts')
            ->select([
                'users.id',
                'users.username',
                'users.images',
                'posts.id',
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
            ->get();

        return view('follows.followList', compact('follow_lists', 'follow_posts'));
    }

    public function followerList(){
        $follower_lists = DB::table('follows')
            ->select([
                'follows.follow',
                'follows.follower',
                'users.id',
                'users.images',
            ])
            ->join('users', 'follows.follower', '=', 'users.id')
            ->where('follow', Auth::id())
            ->get();

        $follower_posts = DB::table('posts')
            ->select([
                'users.id',
                'users.username',
                'users.images',
                'posts.id',
                'posts.user_id',
                'posts.posts',
                'posts.created_at',
                'posts.updated_at',
                'follows.follow',
                'follows.follower',
            ])
            ->join('follows', 'posts.user_id', '=', 'follows.follower')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('follows.follow', Auth::id())
            ->orWhere('posts.user_id', Auth::id())
            ->orderBy('posts.updated_at', 'desc')
            ->get();

        return view('follows.followerList', compact('follower_lists', 'follower_posts'));
    }

    public function follow(Request $request){
        $follower = Auth::user()->id;
        $follow = $request->input('id');

        DB::table('follows')->insert([
            'follower' => $follower,
            'follow' => $follow,
        ]);

        return back();
    }

    public function unfollow(Request $request){
        $follower = Auth::user()->id;
        $follow = $request->input('id');

        DB::table('follows')
            ->where('follower', $follower)
            ->where('follow', $follow)
            ->delete();

        return back();
    }

}
