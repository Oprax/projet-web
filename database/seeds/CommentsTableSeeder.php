<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Activity;
use App\Photo;

class CommentsTableSeeder extends Seeder
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
        $photos = Photo::all();

        for ($i = 0; $i < 3; $i++) {
            /*
             * Comment for Activities
             */
            $comm_act = factory(App\Comment::class, $activities->count())->make([
                'commentable_type' => 'Activity',
                'user_id' => $users->random()->id
            ]);
            for ($i = 0; $i < $activities->count(); $i++) {
                $comm_act[$i]->commentable_id = $activities[$i]->id;
                $comm_act[$i]->save();
            }

            /*
             * Comment for Photos
             */
            $comm_pho = factory(App\Comment::class, $photos->count())->make([
                'commentable_type' => 'Photo',
                'user_id' => $users->random()->id
            ]);
            for ($i = 0; $i < $photos->count(); $i++) {
                $comm_pho[$i]->commentable_id = $photos[$i]->id;
                $comm_pho[$i]->save();
            }
        }
    }
}
