<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

	 /*

	 	foreign keys to country are, Country -> Province -> City;

	  */

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');

			$table->string('name');

			//shortened name of the country
			$table->string('short_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('countries');
    }
}
