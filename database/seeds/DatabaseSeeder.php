<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(InstrumentTableSeeder::class);
        $this->call(AdTableSeeder::class);
        $this->call(AdInstrumentTableSeeder::class);

		// Seed them roles and permissions
		$this->call(RolePermissionTableSeeder::class);
    }
}
