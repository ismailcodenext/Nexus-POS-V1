<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{



    public function CustomerList()
{
    try {
        // Fetch all CustomerData
        $CustomerData = Customer::all();
        return response()->json(['status' => 'success', 'CustomerData' => $CustomerData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}



public function CustomerCreate(Request $request)
{
    try {
        $user_id = Auth::id();
        // Create the CustomerData
        Customer::create([
            'customer_id' => $this->generateCustomerID(),
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'seller_person_name' => $request->input('seller_person_name'),
            'user_id' => $user_id
        ]);
        return response()->json(['status' => 'success', 'message' => "Customer Created Successfully"]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


private function generateCustomerID()
{
    $currentYear = date('Y');
    $lastPurchase = Customer::orderBy('id', 'desc')->first();
    $lastIdNumber = $lastPurchase ? (int)substr($lastPurchase->customer_id, -4) : 0;
    $newIdNumber = $lastIdNumber + 1;
    return '#CNIT-' . $currentYear . '-' . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
}


}
