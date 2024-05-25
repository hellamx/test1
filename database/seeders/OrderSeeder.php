<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsIds = Product::query()->pluck('id')->toArray();

        Order::factory(30)->create()->each(function ($order) use ($productsIds) {
            OrderProduct::factory()->count(rand(3, 10))->create([
                'order_id' => $order->id,
                'product_id' => $productsIds[rand(0, (count($productsIds) - 1))]
            ]);
        });
    }
}
