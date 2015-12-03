<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

class SpendingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$currencyController = new CurrencyController();
		$data  = array(
			'pageTitle' => 'Spending',
			'secondaryCurrencyMoney' =>  $currencyController->convert(\Auth::user()->currentMoney, \Auth::user()->mainCurrency, \Auth::user()->secondaryCurrency)
		);
		$spendings = \DB::table('pengeluaran')->where('idUser', \Auth::user()->id)->get();
		$nextPayment = array();
		// $nextPayment = array();
		foreach ($spendings as $spending) {
			$date = Carbon::parse($spending->nextPayment);
					
			if ($spending->frequency == "monthly") {
				while($date->isPast()){
					$date->addMonth();
				}
			}
			elseif($spending->frequency = "daily"){
				while($date->isPast()){
					$date->addDay();
				}
			}
			$nextPayment[$spending->id] = $date->toFormattedDateString();
		}
		return \View::make('spending.spending')->with('data',$data)->with('spendings', $spendings)->with('nextPayment',$nextPayment);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
