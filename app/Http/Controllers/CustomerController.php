<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\{
    File,
    Validator
};

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $customer = Customer::latest()->get();
        if ($request->ajax()) {

            return DataTables::of($customer)
                ->addIndexColumn()
                ->addColumn('action', function ($customer) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $customer->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';

                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $customer->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';

                    return $btn;
                })
                ->addColumn('profile', function ($customer) {
                    $url = asset('img/customers/' . $customer->profile);
                    return '<img src= ' . $url . ' class="img-rounded"  height=80 width=80  />';
                })
                ->rawColumns(['profile', 'action'])
                ->make(true);
        }

        return view('customers.list');
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400, 'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $customer = Customer::createCustomer($request->all());
            if ($request->hasFile('profile')) {
                Customer::uploadImage($request, $customer);
            }

            return response()->json([
                'status' => 200,
                'message' => 'sucessfully new customer is added'
            ]);
        }
    }


    public function edit($id)
    {
        $customer = Customer::findCustomer($id);
        return response()->json($customer);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile' => 'image',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400, 'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $customer = Customer::findCustomer($id);
            $customer->name = $request->input('name');
            $customer->status = $request->input('status');
            if ($request->file('profile')) {
                Customer::deleteImage($customer);
                Customer::uploadImage($request, $customer);
            }else{
            $customer->save();}
            return response()->json([
                'status' => 200,
                'message' => 'sucessfully new customer is updated'
            ]);
        }
    }

    public function destory($id)
    {
        $customer = Customer::findCustomer($id);
        if ($customer->profile) {
            Customer::deleteImage($customer);
        }
        $customer->delete();
        return response()->json(['success' => 'Customer deleted successfully.']);
    }
}
