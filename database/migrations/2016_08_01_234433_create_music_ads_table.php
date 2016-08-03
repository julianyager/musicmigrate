<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
			//primary ads_id
            $table->increments('id');

			$table->integer('user_id')
			->unsigned()
			->foreign('user_id')
			->references('id')
			->on('users')
			->onDelete('cascade');

			//ad info within ads table
			$table->string('title');
			$table->timestamps();
			$table->timestamp('expire_on');
			$table->mediumText('description');
			$table->boolean('active');

			//foreign keys for any other relevant information for ad
			$table->integer('genre_id')
			->unsigned()
			->foreign('genre_id')
			->references('id')
			->on('experience');

			$table->integer('city_id')
			->unsigned()
			->foreign('city_id')
			->references('id')
			->on('city');


			$table->integer('province_id')
			->unsigned()
			->foreign('province_id')
			->references('id')
			->on('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads');
    }
}
