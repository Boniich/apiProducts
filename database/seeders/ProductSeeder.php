<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();

        $product->name = "Producto 1";
        $product->description = "Este es el producto 1";
        $product->price = 10.5;

        $product->save();

        $product2 = new Product();

        $product2->name = "Product 2";
        $product2->description = "Este es el producto 2";
        $product2->price = 5;

        $product2->save();
    }
}
