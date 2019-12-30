<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('services')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // create user
        \App\Model\Service::create([
            'name'     => 'Hair cutting',
            'cost_per' => 'Per cut',
            'price'    => 600,
            'branch_id' => 1
        ]);
    }
}
