<?php

namespace Database\Seeds;

use App\Association;
use App\Activity;
use Carbon\Carbon;
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
        $assoc_bde = Association::all()->where('name', 'BDE')->first();
        $activities = factory(Activity::class, 3)->make([
            'is_proposal' => false,
            'is_accept' => true,
            'can_subscribe' => false,
            'association_id' => $assoc_bde->id
        ]);
        $activities[0]->date = Carbon::now();
        $activities[1]->date = Carbon::now()->addMonth(3);
        $activities[2]->date = Carbon::now()->subMonth(3);
        foreach ($activities as $activity) {
            $activity->save();
        }
    }
}
