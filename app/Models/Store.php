<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public static function indexStore()
    {
        return Store::all();
    }


    public static function createStore($request)
    {
        Store::create($request);
    }


    public static function destroyStore($slug)
    {
        Store::where('slug', $slug)->delete() ;
    }


    public static function updateStore($request ,$slug )
    {
        $store= Store::where('slug', $slug)->first() ;
        $store->name = $request['name'] ;
        $store->status = $request['status'] ;
        $store->slug = $request['slug'] ;
        $store->save();
    }
}
