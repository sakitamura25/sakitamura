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
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function profileUpdate(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required|between:4,12',
            // 'mail' => 'required|email|between:4,12|unique:users',
            // 'password' => 'required|alpha_num|between:4,12|unique:users',
            'bio' => 'max:200',
        ]);

        if ($validator->fails()) {

            return redirect('/profile');
                // ->withError($validator)
                // ->withInput();

        } else {

        $user = Auth::user();
        $user->username = $request->input('upUserName');
        $user->mail = $request->input('upMail');
        $user->password = bcrypt($request->input('newPassword'));
        $user->bio = $request->input('bio');
        // $user->images = $request->file('images')->store('public/images');
        $user->save();

        return view('users.profile');
        }

    }

    public function index(Request $request){
        $keyword = $request ->input('keyword');
        $id = Auth::id();
        $query = DB::table('users')
            ->where('id', '!=', $id);

        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        if (!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%")
                ->get();
        }
            $users = $query->get();

        return view('users.search', compact('keyword', 'users', 'follows'));
    }



}
