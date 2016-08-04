<?php

use Illuminate\Database\Seeder;

class AdInstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('ad_instruments')->insert([
			'ad_id' => 1,
			'instrument_id' => 2
		]);

		DB::table('ad_instruments')->insert([
			'ad_id' => 1,
			'instrument_id' => 3
		]);
    }
}
