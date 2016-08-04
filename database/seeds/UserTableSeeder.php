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
		DB::table('users')->insert([
			'name' => 'Julian',
			'email' => 'julian@gmail.com',
			'password' => bcrypt('secret'),
		]);
    }
}
