<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
        	'name'=>'s'.mt_rand(100,999),
        	'password'=>bcrypt('secret')
        ]);
    }
}
