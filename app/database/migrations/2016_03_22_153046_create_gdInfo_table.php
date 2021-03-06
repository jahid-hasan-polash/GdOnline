<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGdInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gd_info', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')
				      ->references('id')->on('users')
				      ->onDelete('cascade')->onUpdate('cascade');

			$table->string('topic');
			$table->integer('thana_id');
			$table->string('occured_at');
			$table->string('occurance_place');
			$table->text('description');
			$table->text('requirement')->nullable();
			$table->integer('officer_id')->nullable();
			$table->integer('layer');
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
		Schema::drop('gd_info');
	}

}
