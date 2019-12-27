<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('branches')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // create user
        \App\Model\Branch::create([
            'location'     => 'Chaya Center',
            'phone_number' => '123456789',
            'open_time'    => '9 AM',
            'close_time'   => '8 PM'
        ]);
    }
}
