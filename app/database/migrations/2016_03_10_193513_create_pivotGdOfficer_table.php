<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotGdOfficerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gd_officer_rel', function(Blueprint $table)
		{
			$table->integer('gd_no')->unsigned()->index();
			$table->foreign('gd_no')
				      ->references('gd_no')->on('gd_info')
				      ->onDelete('cascade')->onUpdate('cascade');

			$table->integer('office_id')->unsigned()->index();
			$table->foreign('office_id')
				      ->references('id')->on('officer')
				      ->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('gd_officer_rel');
	}

}
