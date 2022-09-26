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

    public function listCustomer(Request $request)
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


    public function createCustomer(Request $request)
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
            $custmer = new Customer;
            $custmer->name = $request->input('name');
            $custmer->status = $request->input('status');
            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $filename = date('Ymd') . $file->getClientOriginalName();
                $path = 'img/customers';
                $file->move(public_path($path), $filename);
                $custmer->profile = $filename;
            }
            $custmer->save();
            return response()->json([
                'status' => 200,
                'message' => 'sucessfully new customer is added'
            ]);
        }
    }


    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }


    public function updateCustomer(Request $request, $id)
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
            $customer = Customer::find($id);
            $customer->name = $request->input('name');
            $customer->status = $request->input('status');
            if ($request->file('profile')) {
                $destination = public_path('img/customers/') . $customer->profile;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('profile');
                $filename = date('Ymd') . $file->getClientOriginalName();
                $path = 'img/customers';
                $file->move(public_path($path), $filename);
                $customer->profile = $filename;
            }
            $customer->save();
            return response()->json([
                'status' => 200,
                'message' => 'sucessfully new customer is updated'
            ]);
        }
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        if ($customer->profile_pic) {
            $destination = public_path('img/users/') . $customer->profile_pic;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $customer->delete();
        return response()->json(['success' => 'Customer deleted successfully.']);
    }
}
