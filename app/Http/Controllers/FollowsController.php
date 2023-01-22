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

        return view('follows.followList', compact('follow_lists'));
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

        return view('follows.followerList', compact('follower_lists'));
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
