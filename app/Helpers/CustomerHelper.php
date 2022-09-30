<?php
/**
 * Created by PhpStorm.
 * User: Nabiza
 * Date: 9/27/2022
 * Time: 4:09 PM
 */

namespace App\Helpers;

use Illuminate\Http;
use Illuminate\Support\Facades\File;

class CustomerHelper
{

    public static function uploadImage($request, $customer)
    {
        $file = $request->file('profile');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $path = 'img/customers';
        $file->move(public_path($path), $filename);
        $customer->profile = $filename;
        $customer->save();
    }

    public static function deleteoldImage($customer)
    {
        $destination = public_path('img/customers/') . $customer->profile;
        if (File::exists($destination)) {
            File::delete($destination);
        }
    }



    
}