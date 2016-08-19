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
		// @JULIAN - This is what's called a PIVOT table, it needs to be singular
		Schema::create('ad_instrument', function (Blueprint $table) {
			$table->integer('ad_id')->unsigned()->index();
			$table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
			$table->integer('instrument_id')->unsigned()->index();
			$table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
			$table->primary(['ad_id', 'instrument_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ad_instrument');
	}
}
