<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{

    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function follow(Request $request){
        $follower = Auth::user()->id;
        $follow = $request->input('id');

        DB::table('follows')->insert([
            'follower' => $follower,
            'follow' => $follow,
        ]);

        return redirect('/search');
    }

    public function unfollow(Request $request){
        $follower = Auth::user()->id;
        $follow = $request->input('id');

        DB::table('follows')
            ->where('follower', $follower)
            ->where('follow', $follow)
            ->delete();

        return redirect('/search');
    }

}
