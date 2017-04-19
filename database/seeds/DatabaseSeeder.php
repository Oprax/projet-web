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

        $id_vet = DB::table('shop_categories')->insertGetId([
            'name' => 'Vetement'
        ]);
        $id_vai = DB::table('shop_categories')->insertGetId([
            'name' => 'Vaisselle'
        ]);

        DB::table('shop_categories')->insert([
            'name' => 'pull',
            'cat_parent' => $id_vet
        ]);

        DB::table('shop_categories')->insert([
            'name' => 'mug',
            'cat_parent' => $id_vai
        ]);

        $this->call(\Database\Seeds\UsersTableSeeder::class);
        $this->call(\Database\Seeds\ActivitiesTableSeeder::class);
        $this->call(\Database\Seeds\PhotosTableSeeder::class);
    }
}
