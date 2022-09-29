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
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public static function createOutlet($request)
    {
        
        return StoreOutlet::create($request);
        
    }
}
