<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemasukanTabble extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pemasukan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->integer('idKategori');
			$table->string('jumlah');
			$table->string('description');
			$table->timestamp('waktu');
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
		Schema::drop('pemasukan');
	}

}
