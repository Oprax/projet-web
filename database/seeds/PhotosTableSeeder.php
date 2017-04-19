<?php

namespace Database\Seeds;
use Illuminate\Database\Seeder;
use App\User;
use App\Activity;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->first();
        $activity = Activity::all()->first();

        factory(Photo::class)->create([
            'user_id' => $user->id,
            'activity_id' => $activity->id
        ]);
    }
}
