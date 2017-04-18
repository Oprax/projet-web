<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assoc_bde = App\Association::all()->where('name', 'BDE')->first();
        $assoc_cesi = App\Association::all()->where('name', 'Cesi')->first();
        $assoc_enk = App\Association::all()->where('name', "en'k")->first();

        $status_a1 = App\Status::all()->where('name', 'A1')->first();
        $status_tut = App\Status::all()->where('name', 'Tuteur')->first();
        $status_a3 = App\Status::all()->where('name', 'A3')->first();

        $role_bde = App\Role::all()->where('name', 'BDE')->first();
        $role_cesi = App\Role::all()->where('name', 'cesi')->first();
        $role_student = App\Role::all()->where('name', 'student')->first();

        factory(App\User::class)->create([
            'association_id' => $assoc_bde->id,
            'status_id' => $status_a1->id,
            'role_id' => $role_bde->id
        ]);
        factory(App\User::class)->create([
            'association_id' => $assoc_cesi->id,
            'status_id' => $status_tut->id,
            'role_id' => $role_cesi->id
        ]);
        factory(App\User::class)->create([
            'association_id' => $assoc_enk->id,
            'status_id' => $status_a3->id,
            'role_id' => $role_student->id
        ]);
    }
}
