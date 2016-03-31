<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('range', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('admin_id')->unsigned()->index();
			$table->foreign('admin_id')
				      ->references('id')->on('users')
				      ->onDelete('cascade')->onUpdate('cascade');
			$table->string('range');
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
		Schema::drop('range');
	}

}
