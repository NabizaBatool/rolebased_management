<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\{
    File,
    Hash
};

class UserController extends BaseController
{
    function listUser()
    {
//        $this->generalFunction();
        $user = User::all();
        return view('users.list',  ['user' => $user]);
    }

    function addUser(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|email:rfc,dns',
            'password' => 'min:6|required',
            'profile_pic' => 'image',
            'dob' => 'required',

        ]);
        $input['password'] =  Hash::make($input['password']);
        $user = User::create($input);
        $user->status =  $request->input('status');
        if ($user->status) {
            $user->status = "active";
        } else {
            $user->status = "Inactive";
        }

        if ($request->file('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'img/users';
            $file->move(public_path($path), $filename);
            $user->profile_pic = $filename;
        }
        $user->save();
        return redirect('/users')->with('success', 'New user is created');
    }

    function editUser($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|email:rfc,dns',
            'profile_pic' => 'image',
            'dob' => 'required',
        ]);
        $user = User::find($id);
        $user->fill($input);
        $user->status =  $request->input('status');
        if ($user->status !== 'Active') {
            $user->status = 'Inactive';
        }
        if ($request->file('profile_pic')) {
            $destination = public_path('img/users/') . $user->profile_pic;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'img/users';
            $file->move(public_path($path), $filename);
            $user->profile_pic = $filename;
        }
       
        $user->save();
        //   session()->flash('success', 'New user is added');
        return redirect('/users')->with('success', 'User Info is updated');
    }

    function deleteUser($id)
    {
        $user = User::find($id);
        if ($user->profile_pic) {
            $destination = public_path('img/users/') . $user->profile_pic;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $user->delete();
        return redirect()->back()->with('fail', 'User is deleted');
    }
}
