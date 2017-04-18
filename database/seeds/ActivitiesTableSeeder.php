<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assoc_bde = App\Association::all()->where('name', 'BDE')->first();
        factory(App\Activity::class)->create([
            'is_proposal' => false,
            'is_accept' => true,
            'can_subscribe' => false,
            'association_id' => $assoc_bde->id
        ]);
    }
}
