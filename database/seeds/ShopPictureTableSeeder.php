<?php

use Illuminate\Database\Seeder;

class ShopPictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Model\Shop\shop_products::get();
        foreach ($products as $product)
        {
            factory(\App\Model\Shop\shop_pictures::class)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
