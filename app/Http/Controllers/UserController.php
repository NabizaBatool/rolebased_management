<?php

namespace App\Http\Controllers;

use Symfony\Component\Console\Input\Input;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function add_user(Request $request)
    {
        $user  = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->dob = $request->input('dob');
        if ($request->file('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'img\users';
            $file->move(public_path($path), $filename);
            $user->profile_pic = $filename;  
        }
        $user->save();
        return view('users.list');
    }

    function view_user()
    {
        $user = User::all();
        return view('users.list',  ['user' => $user]);
    }

    function edit_user($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->status =  $request->input('status');
        $user->dob =  $request->input('dob');
        $user->profile_pic =  $request->input('profile_pic');
        $user->update();
        return redirect('/dashboard');
    }
}
    


