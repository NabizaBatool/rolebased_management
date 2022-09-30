<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOutlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch',
        'store_id',
        'status',
    ];

    public function storeCategory(){
        return $this->belongsToMany(StoreCategory::class , 'store_outlet_categories') ;
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
    public static function indexStore()
    {
        return StoreOutlet::all();
    }
    public static function createOutlet($request)
    {  
        return StoreOutlet::create($request);  
    }
    public static function destroyOutlet($id)
    {
        StoreOutlet::find($id)->delete() ;
    }

}
