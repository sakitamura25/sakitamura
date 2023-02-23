<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\DB;



class UsersController extends Controller
{

    public function index(Request $request){
        $keyword = $request ->input('keyword');
        $id = Auth::id();
        $query = DB::table('users')
            ->where('id', '!=', $id);

        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        if (!empty($keyword)) {
            $users = $query->where('username', 'LIKE', "%{$keyword}%")
                ->get();
        }
            $users = $query->get();

        return view('users.search', compact('keyword', 'users', 'follows'));
    }

    public function profile($id){
        $users = DB::table('users')
            ->where('id', $id)
            ->first();

        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        $posts = DB::table('posts')
            ->select([
                'posts.id',
                'posts.user_id',
                'posts.posts',
                'posts.created_at',
                'posts.updated_at',
                'users.id',
                'users.username',
                'users.images',
            ])
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('user_id', $id)
            ->get();

        return view('users.profile', compact('users', 'follows', 'posts'));
    }

}
