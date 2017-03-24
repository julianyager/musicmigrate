<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('genres')->insert([
			'name' => 'Rock'
		]);

		DB::table('genres')->insert([
			'name' => 'Blues'
		]);

		DB::table('genres')->insert([
			'name' => 'Jazz'
		]);

		DB::table('genres')->insert([
			'name' => 'Folk'
		]);

		DB::table('genres')->insert([
			'name' => 'Techno'
		]);

		DB::table('genres')->insert([
			'name' => 'Pop'
		]);

		DB::table('genres')->insert([
			'name' => 'Country'
		]);

		DB::table('genres')->insert([
			'name' => 'Disco'
		]);

		DB::table('genres')->insert([
			'name' => 'Dubstep'
		]);

		DB::table('genres')->insert([
			'name' => 'Funk'
		]);

		DB::table('genres')->insert([
			'name' => 'Blues'
		]);

		DB::table('genres')->insert([
			'name' => 'Reggae'
		]);

		DB::table('genres')->insert([
			'name' => 'Hip Hop'
		]);

		DB::table('genres')->insert([
			'name' => 'Orchestra'
		]);

		DB::table('genres')->insert([
			'name' => 'Singing'
		]);

		DB::table('genres')->insert([
			'name' => 'Classical'
		]);

		DB::table('genres')->insert([
			'name' => 'Opera'
		]);

		DB::table('genres')->insert([
			'name' => 'Gospel'
		]);

		DB::table('genres')->insert([
			'name' => 'House'
		]);

		DB::table('genres')->insert([
			'name' => 'Trance'
		]);

		DB::table('genres')->insert([
			'name' => 'Grunge'
		]);

		DB::table('genres')->insert([
			'name' => 'Soul'
		]);

		DB::table('genres')->insert([
			'name' => 'Trap'
		]);

		DB::table('genres')->insert([
			'name' => 'Progressive'
		]);

		DB::table('genres')->insert([
			'name' => 'Bluegrass'
		]);

		DB::table('genres')->insert([
			'name' => 'Electronica'
		]);

		DB::table('genres')->insert([
			'name' => 'Blues'
		]);
    }
}
