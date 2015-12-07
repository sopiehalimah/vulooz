<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// \DB::table('users')->where('id', \Auth::user()->id)->get();
		$currencyController = new CurrencyController();
		$data  = array(
			'pageTitle' => 'Dashboard',
			'secondaryCurrencyMoney' =>  $currencyController->convert(\Auth::user()->currentMoney, \Auth::user()->mainCurrency, \Auth::user()->secondaryCurrency)
		);
		return \View::make('dashboard')->with('data',$data);
	}
}
