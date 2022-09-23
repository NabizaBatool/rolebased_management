<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use \Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    //
    public function listCustomer(Request $request)
    {
        $cust = Customer::get();
        if ($request->ajax()) {
            $data = Customer::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('customers.list' ,['cust'=> $cust]);
    }

    public function createCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile' => 'image',
        ]);
        $cust = Customer::create(['name' => $request->name, 'status' => $request->status, 'profile' => $request->profile]);
        // if ($request->file('profile')) {
        //     $file = $request->file('profile');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $path = 'img/customers';
        //     $file->move(public_path($path), $filename);
        //     $request->profile = $filename;
        // } 
        $cust->save();
    }
}
