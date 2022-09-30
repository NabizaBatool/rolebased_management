<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Store;

use App\Helpers\ResponseHandler;

class StoreController
{
    public function index()
    {
        try {
            $store = Store::indexStore();
            return ResponseHandler::success($store);
        } catch (\Exception $e) {
            return ResponseHandler::failure($e->getMessage());
        }
    }


    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            $store = Store::createStore($request->all());
            return ResponseHandler::success($store);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHandler::failure($e->getMessage());
        } finally{
            DB::commit();
        }
 
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
