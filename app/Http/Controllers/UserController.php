<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File ;

class UserController extends Controller
{
    function listUser()
    {
        $user = User::all();
        return view('users.list',  ['user' => $user]);
    }
    function addUser(Request $request)
    {
        $user  = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        if( $user->status ){
            $user->status ="active";
        }
        else{
            $user->status ="Inactive";
        }
        $user->dob = $request->input('dob');
        if ($request->file('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'img/users';
            $file->move(public_path($path), $filename);
            $user->profile_pic = $filename;  
        }
        $user->save();
      //  session()->flash('success', 'New user is added');
        return redirect('/users')->with('success' , 'New user is created');
    }

    function editUser($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status =  $request->input('status');
        $user->dob =  $request->input('dob');
        if ($request->file('profile_pic')) {
            $destination=public_path('img/users/').$user->profile_pic;
            if(File::exists($destination)){
                File::delete( $destination);
            }
            $file = $request->file('profile_pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'img/users';
            $file->move(public_path($path), $filename);
            $user->profile_pic = $filename;  
        }  
        $user->update();
     //   session()->flash('success', 'New user is added');
     return redirect('/users')->with('success' , 'User Info is updated');
      
    }

    function deleteUser($id)
    {
        $user = User::find($id);
        if ($user->profile_pic) {
            $destination=public_path('img/users/').$user->profile_pic;
            if(File::exists($destination)){
                File::delete( $destination);
            }
        }
        $user->delete();
        return redirect()->back()->with('fail', 'User is deleted');
    }
}
    


