<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Store;


class StoreController
{
    public function index()
    {
        $store = Store::indexStore();
        return view('stores.index',  ['store' => $store]);
    }


    public function create(Request $request)
    {
        Store::createStore($request->all());
        return redirect('api/stores')->with('success', 'New store is created');
    }


    public function destory($slug)

    {
        Store::destroyStore($slug);
        return redirect('api/stores')->with('success', 'Store has been deleted');
    }


    public function update(Request $request, $slug)
    {
        $storeData = $request->all();
        Store::updateStore($storeData, $slug);
        return redirect('api/stores')->with('success', 'Store has been deleted');
    }

    
    function edit($slug)
    {
        $store = Store::findStore($slug);
        return view('stores.edit', ['store' => $store]);
    }
}
