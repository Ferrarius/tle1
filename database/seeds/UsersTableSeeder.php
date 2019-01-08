<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Bol.com',
            'email' => 'bol@test.com',
            'password' => bcrypt('testtest')
        ]);
        $user->role = 2;
        $user->save();

        $user = User::create([
            'name' => 'VerduurzaamJeHuis',
            'email' => 'verduurzaam@test.com',
            'password' => bcrypt('testtest')
        ]);
        $user->role = 2;
        $user->save();

        $user = User::create([
            'name' => 'EnergieCentraal',
            'email' => 'energiecentraal@test.com',
            'password' => bcrypt('testtest')
        ]);
        $user->role = 2;
        $user->save();

        User::create([
            'name' => 'admin',
            'email' => 'admin@test.nl',
            'password' => bcrypt('secret')
        ]);
    }
}
