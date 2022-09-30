<?php

namespace App\Http\Controllers;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    public function store(Request $request)
    {
        StoreCategory::createCategory($request->all());
        return ["result"=>"created"] ;
    }
}
