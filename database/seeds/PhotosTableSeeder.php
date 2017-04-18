<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->first();
        $activity = App\Activity::all()->first();

        factory(App\Photo::class)->create([
            'user_id' => $user->id,
            'activity_id' => $activity->id
        ]);
    }
}
