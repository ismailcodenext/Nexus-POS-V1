<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Purchases;
use App\Models\Purchasess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseProductDetails;
use App\Models\PurchasesPaymentRecord;

class PurchasesController extends Controller
{
    public function PurchasesList()
    {
        try {
            // Fetch all categories
            $PurchasessData = Purchases::all();
            return response()->json(['status' => 'success', 'PurchasessData' => $PurchasessData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

public function PurchasesCreate(Request $request)
{
    try {
        $user_id = Auth::id();
        DB::beginTransaction();

        // Handle document upload if there's an image file
        $img_url = null;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $img_name = "{$user_id}-" . time() . "-" . $img->getClientOriginalName();
            $img_url = "uploads/purchases-img/{$img_name}";
            $img->move(public_path('uploads/purchases-img'), $img_name);
        }

        // Create Purchase record
        $purchase = Purchases::create([
            'purchases_id' => $this->generatePurchasesID(),
            'supplier_id' => $request->supplier_id,
            'wareshop_id' => $request->wareshop_id,
            'date' => $request->date,
            'status' => $request->status,
            'subtotal' => $request->subtotal,
            'discount' => $request->discount,
            'grand_subtotal' => $request->grand_subtotal,
            'referance_no' => $request->referance_no,
            'paid' => $request->paid,
            'due' => $request->due,
            'payment_method' => $request->payment_method,
            'attach_document' => $img_url,
            'user_id' => $user_id,
        ]);

        // Save product details in the `purchase_product_details` table
        $products = json_decode($request->products, true);
        foreach ($products as $product) {
            if (isset($product['product_id'], $product['quantity'])) {
                PurchaseProductDetails::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product['product_id'],
                    'user_id' => $user_id,
                ]);

                // Update the product quantity in `products` table
                $productModel = Product::find($product['product_id']);
                if ($productModel) {
                    $productModel->quantity += $product['quantity'];
                    $productModel->save();
                }
            }
        }

        // Create a payment record if the purchase is fully paid
  // Check if the purchase is partially or fully paid
if ($request->paid > 0) {
    PurchasesPaymentRecord::create([
        'purchase_id' => $purchase->id,
        'referance_no' => $this->PurchaseProductDetailsID(),
        'transaction_id' => $request->transaction_id,
        'date' => $request->date,
        'payment_method' => $request->payment_method,
        'user_id' => $user_id,
    ]);
}


        DB::commit();
        return response()->json(['status' => 'success', 'message' => 'Purchase created successfully']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['status' => 'fail', 'message' => 'Failed to create purchase: ' . $e->getMessage()]);
    }
}

private function PurchaseProductDetailsID()
{
    $currentYear = date('Y');
    $lastPurchase = Purchases::orderBy('id', 'desc')->first();
    $lastIdNumber = $lastPurchase ? (int)substr($lastPurchase->purchases_id, -4) : 0;
    $newIdNumber = $lastIdNumber + 1;
    return 'ppr-' . $currentYear . '-' . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
}

private function generatePurchasesID()
{
    $currentYear = date('Y');
    $lastPurchase = Purchases::orderBy('id', 'desc')->first();
    $lastIdNumber = $lastPurchase ? (int)substr($lastPurchase->purchases_id, -4) : 0;
    $newIdNumber = $lastIdNumber + 1;
    return 'pur-' . $currentYear . '-' . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
}

}
