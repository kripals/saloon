<?php

use App\Model\User;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // create user
        User::create([
            'name'      => 'Super Admin',
            'email'     => 'super_admin@test.com',
            'password'  => bcrypt('Admin'),
            'branch_id' => 1
        ]);
    }
}
