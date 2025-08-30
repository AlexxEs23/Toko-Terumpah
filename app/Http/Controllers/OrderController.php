<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function dataOrder(){
        $orders = Order::with(['user', 'product'])->orderBy('created_at', 'desc')->get();
        return view('admin.order.data_order', compact('orders'));
    }

    public function createOrder(){
        $products = Produk::where('stock', '>', 0)->orderBy('name')->get();
        $users = User::where('role', 'user')->orderBy('name')->get();
        return view('admin.order.create_order', compact('products', 'users'));
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Produk::findOrFail($request->product_id);
        
        // Check if stock is sufficient
        if ($product->stock < $request->jumlah) {
            return redirect()->back()->with('error', 'Stock tidak mencukupi. Stock tersedia: ' . $product->stock);
        }

        $totalHarga = $product->price * $request->jumlah;

        // Create order
        Order::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
        ]);

        // Reduce stock
        $product->decrement('stock', $request->jumlah);

        return redirect()->route('admin.dataOrder')->with('success', 'Order created successfully.');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.dataOrder')->with('success', 'Order status updated successfully.');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        
        // Return stock to product
        if ($order->product) {
            $order->product->increment('stock', $order->jumlah);
        }
        
        $order->delete();
        
        return redirect()->route('admin.dataOrder')->with('success', 'Order deleted successfully and stock returned.');
    }

    // User methods for ordering from frontend
    public function userStoreOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'address' => 'required|string',
            'product_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Produk::findOrFail($request->product_id);
        
        // Check if stock is sufficient
        if ($product->stock < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock);
        }

        $totalHarga = $product->price * $request->jumlah;

        // Use authenticated user
        $user = Auth::user();

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        // Reduce stock
        $product->decrement('stock', $request->jumlah);

        // Store customer details in session for order success page
        session([
            'customer_details' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        ]);

        return redirect()->route('user.orderSuccess', $order->id);
    }

    public function orderSuccess($id)
    {
        $order = Order::with(['user', 'product'])->findOrFail($id);
        $customerDetails = session('customer_details');
        
        return view('order-success', compact('order', 'customerDetails'));
    }

    public function userOrders()
    {
        $orders = Order::with(['product'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('user.orders', compact('orders'));
    }
}
