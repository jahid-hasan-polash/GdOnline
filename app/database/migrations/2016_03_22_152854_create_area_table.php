<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('area', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ps_id')->unsigned()->index();
			$table->foreign('ps_id')
				      ->references('id')->on('ps')
				      ->onDelete('cascade')->onUpdate('cascade');
				      
			$table->string('ps_name');
			$table->string('area_name');
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
		Schema::drop('area');
	}

}
