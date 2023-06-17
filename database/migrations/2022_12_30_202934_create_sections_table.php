<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Name_Section');
			$table->integer('Status');
			$table->timestamps();
			$table->bigInteger('Grade_id')->unsigned();
			$table->bigInteger('Class_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}
