<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengeluaran', function(Blueprint $table)
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
		Schema::drop('pengeluaran');
	}

}
