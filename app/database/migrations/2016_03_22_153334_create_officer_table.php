<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('officer', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('ps_id')->unsigned()->index();
			$table->foreign('ps_id')
				      ->references('id')->on('ps')
				      ->onDelete('cascade')->onUpdate('cascade');
				      
			$table->string('name');
			$table->string('email')->unique();
			$table->text('phone_number');
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
		Schema::drop('officer');
	}

}
