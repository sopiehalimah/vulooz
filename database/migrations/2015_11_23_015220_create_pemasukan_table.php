<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemasukanTable extends Migration {

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
			$table->integer('amount');
			$table->string('currency');
			$table->string('description');
			$table->string('frequency');
			$table->string('type');
			$table->timestamp('nextPayment');
			$table->timestamps();
		});
		for ($i=1; $i<=6 ; $i++) { 
			DB::table('pemasukan')->insert(
		        array(
		        	'idUser' => $i,
		           	'amount' => rand(700000,4000000),
		           	'currency' => 'mainCurrency',
		           	'description' => 'Teacher at SMKN 10 Jakarta',
		           	'frequency' => 'monthly',
		           	'type' => 'salary',
		           	'nextPayment' => '2015-11-09'
		        )
		    );
		}
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
