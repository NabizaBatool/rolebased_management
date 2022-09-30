<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\{
    Store,
    StoreOutlet
};

class StoreOutletController
{

    public function index()
    {
        $storeoutlet = StoreOutlet::indexStore();
        return view('storeoutlets.index',  ['storeoutlet' => $storeoutlet]);
    }

    public function store(Request $request)
    {
        StoreOutlet::createOutlet($request->all());
        return redirect('api/storeoutlets')->with('success', 'Store has created');
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

    public function destory($id)

    {
        StoreOutlet::destroyOutlet($id);
        return redirect('api/storeoutlets')->with('success', 'Store has deleted');
    }

    
}
