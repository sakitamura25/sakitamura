<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function profileUpdate(Request $request){

        $request = Validator::make($request->all(),[
            'username' => 'required|between:4,12',
            'mail' => ['required', 'email', 'between:4,12', Rule::unique('users')->ignore(Auth::id())],
            'new_password' => 'alpha_num|between:4,12|unique:users',
            'bio' => 'max:200',
        ])->validate();

        $user = Auth::user();
        $user->username = $request->input('upUserName');
        $user->mail = $request->input('upMail');
        $user->password = bcrypt($request->input('newPassword'));
        $user->bio = $request->input('bio');
        $user->save();



        return redirect('/top');
    }

    public function search(){
        return view('users.search');
    }
}
