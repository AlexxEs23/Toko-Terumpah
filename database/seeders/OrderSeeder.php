<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Produk;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some users and products
        $users = User::where('role', 'user')->get();
        $products = Produk::all();

        if ($users->count() > 0 && $products->count() > 0) {
            // Create sample orders
            for ($i = 0; $i < 10; $i++) {
                $user = $users->random();
                $product = $products->random();
                $quantity = rand(1, 5);
                $totalPrice = $product->price * $quantity;

                Order::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'jumlah' => $quantity,
                    'total_harga' => $totalPrice,
                    'created_at' => now()->subDays(rand(0, 30)),
                ]);
            }
        }
    }
}
