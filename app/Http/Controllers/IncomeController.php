<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}
	

	public function index()
	{
		$currencyController = new CurrencyController();
		$data  = array(
			'pageTitle' => 'Income',
			'secondaryCurrencyMoney' =>  $currencyController->convert(\Auth::user()->currentMoney, \Auth::user()->mainCurrency, \Auth::user()->secondaryCurrency)
		);
		$incomes = \DB::table('pemasukan')->where('idUser', \Auth::user()->id)->get();
		$nextPayment = array();
		// $nextPayment = array();
		foreach ($incomes as $income) {
			$date = Carbon::parse($income->nextPayment);
					
			if ($income->frequency == "monthly") {
				while($date->isPast()){
					$date->addMonth();
				}
			}
			elseif($income->frequency = "daily"){
				while($date->isPast()){
					$date->addDay();
				}
			}
			$nextPayment[$income->id] = $date->toFormattedDateString();
		}
		return \View::make('income.income')->with('data',$data)->with('incomes', $incomes)->with('nextPayment',$nextPayment);
	}

	public function details($id)
	{
		$currencyController = new CurrencyController();
		$data  = array(
			'pageTitle' => 'Income',
			'secondaryCurrencyMoney' =>  $currencyController->convert(\Auth::user()->currentMoney, \Auth::user()->mainCurrency, \Auth::user()->secondaryCurrency)
		);
		$incomes = \DB::table('pemasukan')->where('id',$id)->where('idUser', \Auth::user()->id)->get();

		foreach ($incomes as $income) {
			$date = Carbon::parse($income->nextPayment);
					
			if ($income->frequency == "monthly") {
				while($date->isPast()){
					$date->addMonth();
				}
			}
			elseif($income->frequency = "daily"){
				while($date->isPast()){
					$date->addDay();
				}
			}
			$nextPayment[$income->id] = $date->toFormattedDateString();
		}
		return \View::make('income.details')->with('data',$data)->with('incomes', $incomes)->with('nextPayment',$nextPayment);
	}

}
