<?php

namespace App\Http\Controllers ;
use Illuminate\Http\Request;
use App\Models\Store;
class StoreController extends Controller
{
    public function index()
    {
        return Store::indexStore();
    }

    public function create(Request $request)
    {
        Store::createStore($request->all());
        return ['Result' => 'Data has been saved'];

    }
    public function destory($slug)

    {
          Store::destroyStore($slug);
          return ['Result' => 'Data has been deleted'];
    }
    public function update( Request $request ,$slug )
    {
        $storeData = $request->all();
        Store::updateStore($storeData , $slug);
        return ['Result' => 'Data has been updated'];

    }
}
