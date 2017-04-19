<?php

namespace Database\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;
use App\Association;
use App\Status;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assoc_bde = Association::all()->where('name', 'BDE')->first();
        $assoc_cesi = Association::all()->where('name', 'Cesi')->first();
        $assoc_enk = Association::all()->where('name', "en'k")->first();

        $status_a1 = Status::all()->where('name', 'A1')->first();
        $status_tut = Status::all()->where('name', 'Tuteur')->first();
        $status_a3 = Status::all()->where('name', 'A3')->first();

        $role_bde = Role::all()->where('name', 'BDE')->first();
        $role_cesi = Role::all()->where('name', 'cesi')->first();
        $role_student = Role::all()->where('name', 'student')->first();

        /*
         * User BDE
         */
        factory(User::class)->create([
            'association_id' => $assoc_bde->id,
            'status_id' => $status_a1->id,
            'role_id' => $role_bde->id,
            'password' => bcrypt('azeaze'),
            'email' => 'romain.muller@vicesi.fr',
            'name' => 'Muller',
            'forename' => 'Romain'
        ]);

        /*
         * User Cesi
         */
        factory(User::class)->create([
            'association_id' => $assoc_cesi->id,
            'status_id' => $status_tut->id,
            'role_id' => $role_cesi->id,
            'password' => bcrypt('azeaze'),
            'email' => 'jf.dollinger@vicesi.fr',
            'name' => 'Dollinger',
            'forename' => 'Jean-François'
        ]);

        /*
         * User normal (student)
         */
        factory(User::class)->create([
            'association_id' => $assoc_enk->id,
            'status_id' => $status_a3->id,
            'role_id' => $role_student->id,
            'password' => bcrypt('azeaze'),
            'email' => 'arno.birchler@vicesi.fr',
            'name' => 'Birchler',
            'forename' => 'Arno'
        ]);
    }
}
