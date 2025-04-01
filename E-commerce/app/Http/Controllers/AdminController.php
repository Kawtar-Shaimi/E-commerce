<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $product_count = Product::count();
        $order_count = Order::count();
        $category_count = Category::count();
        $payments = Payment::with( 'order.client')->get();

        return view('admin.index', compact('user_count', 'product_count', 'order_count', 'category_count', 'payments'));
    }

    public function products()
    {
        try {
            $products = Product::all();
            return view('admin.products.index', compact('products'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting products try again later.');
        }

    }

    public function product(Product $product)
    {
        try {
            $product->load('category', 'publisher');
            return view('admin.products.show', compact('product'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting product try again later.');
        }
    }

    public function destroyProduct(Product $product)
    {
        try {
            $isDeleted = $product->delete();

            if (!$isDeleted) {
                return back()->with('error', 'Product not deleted.');
            }

            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting deleting product try again later.');
        }
    }


    public function orders()
    {

        try {
            $orders = Order::with('client')->get();
            return view('admin.orders.index', compact('orders'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting orders try again later.');
        }
    }

    public function order(Order $order)
    {
        try {
            $order->load('client', 'orderProducts.product', 'payment');
            return view('admin.orders.show', compact('order'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting order try again later.');
        }
    }

    public function destroyOrder(Order $order)
    {
        try {
            $isDeleted = $order->delete();

            if (!$isDeleted) {
                return back()->with('error', 'Order not deleted.');
            }

            return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while deleting order try again later.');
        }
    }

    public function changeOrderStatusView(Order $order)
    {
        return view('admin.orders.change-status', compact('order'));
    }

    public function changeOrderStatus(Order $order, Request $request)
    {
        try {
            $revertedStatusArr = [
                'pending' => ["in shipping","completed","cancelled"],
                'in shipping' => ["completed","cancelled"],
                'completed' => ["cancelled"],
                'cancelled' => ["completed"],
            ];

            $request->validate([
                'status' => 'required|string|in:pending,in shipping,completed,cancelled'
            ]);

            if (in_array($order->status, $revertedStatusArr[$request->status])) {
                return back()->with('error', "You cannot revert an order status");
            }

            $isUpdated = $order->update([
                'status' => $request->status
            ]);

            if (!$isUpdated) {
                return back()->with('error', 'Order status not updated.');
            }

            if ($request->status === "completed") {
                $order->payment()->update([
                    "status" => "paid"
                ]);
            }

            if ($request->status === "cancelled") {
                $order->payment()->update([
                    "status" => "failed"
                ]);
            }

            return redirect()->route('admin.orders.index', $order)->with('success', 'Order status updated successfully.');
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while updating order status try again later.');
        }
    }
}
