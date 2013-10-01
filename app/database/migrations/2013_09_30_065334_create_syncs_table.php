<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSyncsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the connections table
        Schema::create('syncs', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('name');
            $table->integer('source_id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->timestamps();
			
			$table->index('name');
			$table->foreign('source_id')
					->references('id')->on('connections')
					->onDelete('cascade');
			$table->foreign('target_id')
					->references('id')->on('connections')
					->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('syncs', function(Blueprint $table) {
			$table->dropIndex('syncs_name_index');
			$table->dropForeign('syncs_source_id_foreign');
			$table->dropForeign('syncs_target_id_foreign');
		});
		Schema::drop('syncs');
	}

}