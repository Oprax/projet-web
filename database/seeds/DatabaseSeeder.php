<?php


use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'BDE'],
            ['name' => 'cesi'],
            ['name' => 'student'],

        ]);

        DB::table('status')->insert([
            ['name' => 'A1'],
            ['name' => 'A2'],
            ['name' => 'A3'],
            ['name' => 'A4'],
            ['name' => 'A5'],
            ['name' => 'Tuteur'],
        ]);

        DB::table('associations')->insert([
            ['name' => 'Cesi'],
            ['name' => 'BDE'],
            ['name' => 'eXia.Lan'],
            ['name' => "en'k"],
        ]);

        DB::table('shop_sizes')->insert([
            ['content' => 'Taille'],
            ['content' => 'XS'],
            ['content' => 'S'],
            ['content' => 'M'],
            ['content' => 'L'],
            ['content' => 'XL'],
            ['content' => 'XXL'],
        ]);
        DB::table('shop_colors')->insert([
            ['content' => 'Couleur'],
            ['content' => 'Rouge'],
            ['content' => 'Noir'],
            ['content' => 'Bleu'],
            ['content' => 'Rose'],
            ['content' => 'Violet'],
            ['content' => 'Gris'],
        ]);

        DB::table('shop_categories')->insert([
            ['name' => 'Choix de la catégorie'],
            ['name' => 'Pull'],
            ['name' => 'Stylo'],
        ]);




        $this->call(\Database\Seeds\UsersTableSeeder::class);
        $this->call(\Database\Seeds\ActivitiesTableSeeder::class);
        $this->call(\Database\Seeds\PhotosTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ShopProductTableSeeder::class);
        $this->call(ShopPictureTableSeeder::class);
    }
}
