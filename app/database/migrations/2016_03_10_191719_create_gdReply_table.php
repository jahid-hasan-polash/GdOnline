<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGdReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gd_reply', function(Blueprint $table)
		{
			$table->integer('Gd_id')->unsigned()->index();
			$table->foreign('Gd_id')
					->references('id')->on('gd_info')
					->onDelete('cascade')->onUpdate('cascade');
			$table->integer('admin_level');
			$table->text('reply')->nullable();
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
		Schema::drop('gd_reply');
	}

}
