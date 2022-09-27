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
}
