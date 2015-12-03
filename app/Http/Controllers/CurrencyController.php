<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CurrencyController extends Controller {

	public function convert($amount, $from, $to) {
		$get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
	  	$get = explode("<span class=bld>",$get);
	  	$get = explode("</span>",$get[1]);  
	  	$converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
		// If Same Currency Checker - returns $from
		if (is_numeric($converted_amount)) {
	        return $converted_amount;
	    } else {
	        return $amount;
	    }
	}
}
