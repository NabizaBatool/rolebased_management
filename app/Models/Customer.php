<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'profile',

    ];

    public static function createCustomer($request)
    {
        return Customer::create($request);
    }

    public static function findCustomer($id)
    {
        return Customer::find($id);
    }
    public static function uploadImage($request, $customer)
    {
        $file = $request->file('profile');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $path = 'img/customers';
        $file->move(public_path($path), $filename);
        $customer->profile = $filename;
        $customer->save();
    }
    public static function deleteImage($customer)
    {
        $destination = public_path('img/customers/') . $customer->profile;
        if (File::exists($destination)) {
            File::delete($destination);
        }
    }
}
