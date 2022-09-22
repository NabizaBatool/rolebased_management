<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    //
    public function listCustomer(){
        return view('customers.create') ;
    }
    public function createCustomer(Request $request){
        $cust=$request->post->all ;
        $customer = Customer::create( $cust);
    }
}
