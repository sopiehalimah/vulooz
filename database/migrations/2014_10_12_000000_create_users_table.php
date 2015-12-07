<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('mainCurrency');
			$table->string('secondaryCurrency');
			$table->integer('currentMoney');
			$table->rememberToken();
			$table->timestamps();
		});
		DB::table('users')->insert(
	        array(
	        	'name' => 'Aunur Refi',
	            'email' => 'admin_aunur@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "100000"
	        )
	    );
		DB::table('users')->insert(
	        array(
	        	'name' => 'Dyo Rizqal Pahlevi',
	            'email' => 'admin_dyo@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "200000"
	        )
	    );
	    DB::table('users')->insert(
	        array(
	        	'name' => 'Fahrel Aviary',
	            'email' => 'admin_fahrel@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "300000"
	        )
	    );
	    DB::table('users')->insert(
	        array(
	        	'name' => 'Ichsan Firdaus',
	            'email' => 'admin_ichsan@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "400000"
	        )
	    );
	    DB::table('users')->insert(
	        array(
	        	'name' => 'Muhammad Reyhan Abizar',
	            'email' => 'admin_reyhan@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "500000"
	        )
	    );
	    DB::table('users')->insert(
	        array(
	        	'name' => 'Sopie Halimah',
	            'email' => 'admin_sopie@vulooz.com',
	            'password' => Hash::make('admin'),
	            'mainCurrency' => "IDR",
	            'secondaryCurrency' => "USD",
	            'currentMoney' => "600000"
	        )
	    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
