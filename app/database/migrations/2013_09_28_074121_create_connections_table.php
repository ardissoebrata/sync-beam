<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the connections table
        Schema::create('connections', function($table)
        {
            $table->increments('id');
			$table->string('con_name');
            $table->string('con_host');
            $table->string('con_user');
            $table->string('con_password');
            $table->string('con_database');
            $table->timestamps();
			
			$table->index('con_name');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('connections', function(Blueprint $table) {
			$table->dropIndex('connections_con_name_index');
		});
		Schema::drop('connections');
	}

}