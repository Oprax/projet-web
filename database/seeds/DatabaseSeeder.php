<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
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

        $id_vet = DB::table('shop_categories')->insertGetId([
            'name' => 'Vetement'
        ]);
        $id_vai = DB::table('shop_categories')->insertGetId([
            'name' => 'Vaisselle'
        ]);
        $vet = DB::table('shop_categories')->insert([
            'name' => 'pull',
            'cat_parent' => $id_vet
        ]);

            $vai = DB::table('sgop_categories')->insertGetId([
                'name' => 'mug',
                'cat_parent' => $id_vai

        ]);
    }
}
