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
			$table->string('occured_at');
			$table->text('description');
			$table->text('requirement')->nullable();
			//$table->integer('gd_no')->nullable();
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
