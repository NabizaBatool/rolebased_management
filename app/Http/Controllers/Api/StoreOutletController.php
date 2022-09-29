<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StoreOutlet;
use App\Models\Store;

class StoreOutletController
{

    public function store(Request $request)
    {
        StoreOutlet::createOutlet($request->all());
        return ['Result' => 'Data has been saved'];
    }

    public function create()
    {
        $stores = Store::all();
        $select = [];
        foreach ($stores as  $store) {
            $select[$store->id] = $store->name;
        }
        return view('storeoutlets.create',  ['select' => $select]);
    }
}
