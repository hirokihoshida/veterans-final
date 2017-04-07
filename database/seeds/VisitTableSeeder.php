<?php

use Illuminate\Database\Seeder;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('visit')->insert([
            'client_id' => 875,
            'date' => '2017-03-03 10:39:15',
            'comments' => 'Test visit #4'
        ]);

        DB::table('visit')->insert([
            'client_id' => 876,
            'date' => '2017-02-27 10:39:15',
            'comments' => 'Test visit #4'
        ]);
    }
}
