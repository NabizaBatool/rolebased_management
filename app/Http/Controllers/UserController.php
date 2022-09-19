<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function add_user(Request $request)
    {
        $input = $request->all();
        $input['password'] =  Hash::make($input['password']);
        $user = User::create($input);
        if ($user) {
            return  back()->with('success', 'New user has been successfuly added to database');
         } else {
           return back()->with('fail', 'something went wrong , try again later');
        }
    
}}
