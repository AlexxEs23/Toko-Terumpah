<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone Samsung Galaxy S23',
                'description' => 'Smartphone flagship dengan kamera 200MP dan prosesor Snapdragon 8 Gen 2',
                'price' => 15000000,
                'stock' => 25,
            ],
            [
                'name' => 'Laptop ASUS ROG Strix',
                'description' => 'Laptop gaming dengan RTX 4060 dan Intel Core i7 Gen 13',
                'price' => 25000000,
                'stock' => 15,
            ],
            [
                'name' => 'Headphone Sony WH-1000XM5',
                'description' => 'Headphone wireless dengan noise cancellation terbaik',
                'price' => 4500000,
                'stock' => 50,
            ],
            [
                'name' => 'Smart TV LG OLED 55 inch',
                'description' => 'Smart TV dengan teknologi OLED dan resolusi 4K',
                'price' => 18000000,
                'stock' => 8,
            ],
            [
                'name' => 'iPad Pro 12.9 inch',
                'description' => 'Tablet premium dengan chip M2 dan Apple Pencil support',
                'price' => 16000000,
                'stock' => 12,
            ],
        ];

        foreach ($products as $product) {
            Produk::create($product);
        }
    }
}
