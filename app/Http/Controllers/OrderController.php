<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderPaymentDetails;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function OrderCreate(Request $request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::id();
            $orderNo = $request->order_no ?? $this->generateOrderNumber();

            // Create Order
            $order = Order::create([
                'order_no' => $orderNo,
                'customer_id' => $request->customer_id,
                'warehouse_id' => $request->warehouse_id,
                'user_id' => $user_id,
            ]);

            // Decode products
            $products = json_decode($request->products, true);
            foreach ($products as $product) {
                if (isset($product['product_id'], $product['quantity'], $product['price'])) {
                    $orderDetails = OrderDetails::create([
                        'product_id' => $product['product_id'],
                        'order_id' => $order->id,
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                        'user_id' => $user_id,
                    ]);

                    // Update product stock
                    $productModel = Product::find($product['product_id']);
                    if ($productModel) {
                        $productModel->quantity -= $product['quantity'];
                        $productModel->save();
                    }
                }
            }

            // Create payment details
            OrderPaymentDetails::create([
                'order_id' => $order->id,
                'order_details_id' => $orderDetails->id,
                'customer_name' => $request->customer_name,
                'shipping_cost' => $request->shipping_cost,
                'discount_amount' => $request->discount_amount,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'sub_total' => $request->sub_total,
                'totalamount' => $request->totalamount,
                'user_id' => $user_id,
            ]);

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Order created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'fail', 'message' => 'Order creation failed: ' . $e->getMessage()]);
        }
    }


/**
 * Generate a unique order number.
 *
 * @return string
 */
private function generateOrderNumber()
{
    $lastOrder = Order::latest('id')->first();
    $lastOrderNo = $lastOrder?->order_no;

    // Extract numeric part and increment
    $nextOrderNumber = 1;
    if ($lastOrderNo && preg_match('/#OrderID(\d+)/', $lastOrderNo, $matches)) {
        $nextOrderNumber = (int)$matches[1] + 1;
    }

    // Format as #POS00001
    return sprintf('#OrderID%05d', $nextOrderNumber);
}


}
