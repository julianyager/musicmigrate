<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_instruments', function (Blueprint $table) {
            $table->increments('id');

			//fk
			$table->integer('ad_id')
					->unsigned()
					->foreign('ad_id')
					->references('id')
					->on('ads');

			$table->integer('instrument_id')
					->unsigned()
					->foreign('instrument_id')
					->references('id')
					->on('instruments');

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
        Schema::drop('ad_instruments');
    }
}
