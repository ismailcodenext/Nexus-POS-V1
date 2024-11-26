<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Draft;
use App\Models\Product;
use App\Models\DraftProductDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DraftController extends Controller
{


public function DraftCreate(Request $request)
{
    DB::beginTransaction(); // Ensure atomic operations

    try {
        $user_id = Auth::id();

        // Generate order number if not provided
        $orderNo = $request->order_no ?? $this->generateOrderNumber();

        // Create Draft
        $draft = Draft::create([
            'order_no' => $orderNo,
            'customer_name' => $request->customer_name,
            'date' => $request->date,
            'sub_total' => $request->sub_total,
            'totalamount' => $request->totalamount,
            'tax' => $request->tax,  // Optional
            'discount' => $request->discount,
            'shipping_cost' => $request->shipping_cost,
            'totalamount' => $request->totalamount, // Optional, you can calculate it on the frontend
            'user_id' => $user_id,
        ]);

        // Decode the products from the frontend
        $products = json_decode($request->products, true);

        foreach ($products as $product) {
            if (isset($product['product_id']) && isset($product['quantity']) && isset($product['price'])) {
                DraftProductDetails::create([
                    'product_id' => $product['product_id'],
                    'draft_id' => $draft->id, // Use draft's ID
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                    'user_id' => $user_id,
                ]);

                // Update product quantity in stock
                $productModel = Product::find($product['product_id']);
                if ($productModel) {
                    $productModel->quantity -= $product['quantity'];
                    $productModel->save();
                }
            }
        }

        DB::commit(); // Commit transaction
        return response()->json(['status' => 'success', 'message' => 'Draft created successfully']);
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback transaction
        return response()->json(['status' => 'fail', 'message' => 'Failed to create draft: ' . $e->getMessage()]);
    }
}

/**
 * Generate a unique order number.
 *
 * @return string
 */
private function generateOrderNumber()
{
    $lastDraft = Draft::latest('id')->first();
    $lastOrderNo = $lastDraft?->order_no;

    // Extract numeric part and increment
    $nextOrderNumber = 1;
    if ($lastOrderNo && preg_match('/#POS(\d+)/', $lastOrderNo, $matches)) {
        $nextOrderNumber = (int)$matches[1] + 1;
    }

    // Format as #POS00001
    return sprintf('#POS%05d', $nextOrderNumber);
}




public function DraftDataList()
{
    try {
        // Fetch drafts with related products
        $DraftInfoData = Draft::latest()->get();

        // Fetch product details grouped by draft_id
        $DraftInfoProductData = DraftProductDetails::with('product') // Assuming 'product' is the relation
            ->get()
            ->groupBy('draft_id');

        // Combine drafts with their related products
        $DraftData = $DraftInfoData->map(function ($draft) use ($DraftInfoProductData) {
            // Fetch the associated products for the current draft
            $products = $DraftInfoProductData->get($draft->id, []);

            return [
                'id' => $draft->id,
                'order_no' => $draft->order_no,
                'customer_name' => $draft->customer_name,  // Ensure this is correctly set in DB
                'date' => $draft->date,
                'sub_total' => $draft->sub_total,
                'tax' => $draft->tax,
                'discount' => $draft->discount,
                'shipping_cost' => $draft->shipping_cost,
                'totalamount' => $draft->totalamount,
                'products' => $products->map(function ($product) {
                    return [
                        'name' => $product->product->name ?? 'N/A', // Related product name
                        'quantity' => $product->quantity,
                        'price' => $product->price,
                    ];
                }) ?? [], // Default to an empty array if no products
            ];
        });

        return response()->json(['status' => 'success', 'DraftData' => $DraftData]);
    } catch (\Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}



public function DraftInfoDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer', // Ensure the ID is an integer
        ]);

        $draftId = $request->input('id');

        // Find and delete the draft
        $draft = Draft::find($draftId);
        if (!$draft) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Draft not found.',
            ]);
        }

        // Optionally delete related DraftProductDetails if required
        DraftProductDetails::where('draft_id', $draftId)->delete();

        // Delete the draft itself
        $draft->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Draft deleted successfully.',
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'fail',
            'message' => $e->getMessage(),
        ]);
    }
}



}
