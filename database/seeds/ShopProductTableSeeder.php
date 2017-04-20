<?php

use Illuminate\Database\Seeder;

class ShopProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Shop\shop_products::class)->create([
        'name' => 'Pull Exia 2015',
        'slug' => 'pull-exia-2015',
        'size' => 1,
        'color' => 0,
        'category_id' => 2,
        ]);

        factory(\App\Model\Shop\shop_products::class)->create([
            'name' => 'Pull Exia 2016',
            'slug' => 'pull-exia-2016',
            'size' => 1,
            'color' => 0,
            'category_id' => 2,
        ]);

        factory(\App\Model\Shop\shop_products::class)->create([
            'name' => 'Stylo Exia 2017',
            'slug' => 'stylo-exia-2017',
            'size' => 0,
            'color' => 1,
            'category_id' => 3,
        ]);

    }
}
