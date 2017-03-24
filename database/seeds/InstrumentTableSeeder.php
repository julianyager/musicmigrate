<?php

use Illuminate\Database\Seeder;

class InstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('instruments')->insert([
			'name' => 'Guitar'
		]);

		DB::table('instruments')->insert([
			'name' => 'Bass'
		]);

		DB::table('instruments')->insert([
			'name' => 'Violin'
		]);

		DB::table('instruments')->insert([
			'name' => 'Drums'
		]);

		DB::table('instruments')->insert([
			'name' => 'Cajón'
		]);

		DB::table('instruments')->insert([
			'name' => 'Handpan/Hang Drum'
		]);

		DB::table('instruments')->insert([
			'name' => 'Marimba'
		]);

		DB::table('instruments')->insert([
			'name' => 'Steelpan'
		]);

		DB::table('instruments')->insert([
			'name' => 'Xylophone'
		]);

		DB::table('instruments')->insert([
			'name' => 'Conga'
		]);

		DB::table('instruments')->insert([
			'name' => 'Accordion'
		]);

		DB::table('instruments')->insert([
			'name' => 'Bag pipe'
		]);

		DB::table('instruments')->insert([
			'name' => 'Horn'
		]);

		DB::table('instruments')->insert([
			'name' => 'Beatboxing'
		]);

		DB::table('instruments')->insert([
			'name' => 'Calrinets'
		]);

		DB::table('instruments')->insert([
			'name' => 'French Horn'
		]);

		DB::table('instruments')->insert([
			'name' => 'Flute'
		]);

		DB::table('instruments')->insert([
			'name' => 'Melodica'
		]);

		DB::table('instruments')->insert([
			'name' => 'Ocarina'
		]);

		DB::table('instruments')->insert([
			'name' => 'Recorder'
		]);

		DB::table('instruments')->insert([
			'name' => 'Saxophones'
		]);

		DB::table('instruments')->insert([
			'name' => 'Trumpet'
		]);

		DB::table('instruments')->insert([
			'name' => 'Trombone'
		]);

		DB::table('instruments')->insert([
			'name' => 'Tuba'
		]);

		DB::table('instruments')->insert([
			'name' => 'Whistle'
		]);

		DB::table('instruments')->insert([
			'name' => 'Banjo'
		]);

		DB::table('instruments')->insert([
			'name' => 'Electric Guitar'
		]);

		DB::table('instruments')->insert([
			'name' => 'Synthesizer'
		]);

		DB::table('instruments')->insert([
			'name' => 'Twelve String Guitar'
		]);

		DB::table('instruments')->insert([
			'name' => 'Harmonica'
		]);

		DB::table('instruments')->insert([
			'name' => 'Piano'
		]);

		DB::table('instruments')->insert([
			'name' => 'Sitar'
		]);

		DB::table('instruments')->insert([
			'name' => 'Harp'
		]);

    }
}
