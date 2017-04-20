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
        $users = User::all();
        $activities = Activity::all();

        for ($i = 0; $i < 2; $i++) {
            $photos = factory(Photo::class, $activities->count())->make([
                'user_id' => $users->random()->id
            ]);
            for ($i = 0; $i < $photos->count(); $i++) {
                $photos[$i]->activity_id = $activities[$i]->id;
                $photos[$i]->save();
            }
        }
    }
}
