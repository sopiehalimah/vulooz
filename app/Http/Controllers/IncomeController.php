<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\pemasukan;
use Auth;

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

	public function save()
	{

		
		$idUser = Auth::user()->id;
		$amount = Input::get('amount');
		$currency = Input::get('currency');
		$description = Input::get('description');
		$frequency = Input::get('frequency');
		$type = Input::get('type');
		$nextPayment = Input::get('nextPayment');

		DB::insert('insert into pemasukan (id,idUser,amount,currency,description,frequency,type,nextPayment) values(?,?,?,?,?,?,?,?)',['',$idUser,$amount,$currency,$description,$frequency,$type,$nextPayment]);

		
		return redirect(url('income'));

	}
	public function edit($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		date('Y-m-d');
		date('H:i:s');
		
		$idUser = Auth::user()->id;
		$amount = Input::get('amount');
		$currency = Input::get('currency');
		$description = Input::get('description');
		$frequency = Input::get('frequency');
		$type = Input::get('type');
		$nextPayment = date('Y-m-d');


		DB::update('insert into pemasukan (id,idUser,amount,currency,description,frequency,type,nextPayment) values(?,?,?,?,?,?,?,?)',['',$idUser,$amount,$currency,$description,$frequency,$type,$nextPayment]);

		
		return redirect(url('income'));

	}

}
