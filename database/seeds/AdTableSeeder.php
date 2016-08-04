<?php

use Illuminate\Database\Seeder;

class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('ads')->insert([
			'user_id' => 1,
			'title' => 'My Test Add',
			'description' => 'Lorem ipsum',
			'genre_id' => 1,
		]);
    }
}
