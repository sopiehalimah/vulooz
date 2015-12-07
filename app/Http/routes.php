<?php

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'WelcomeController@index'); // Halaman Utama / Landing Page (Belum Login)


Route::get('home', 'WelcomeController@index');

Route::get('/home', 'HomeController@index'); // Halaman Utama / Dashboard (Sudah Login)
 // fc8c2e5238afca78fbf16c5b309710a30937bf54

Route::get('/login', 'Auth\AuthController@getLogin'); // Halaman Login
Route::post('/login', 'Auth\AuthController@postLogin'); // Proses Login

Route::get('/register', 'Auth\AuthController@getRegister'); // Halaman Register
Route::post('/register', 'Auth\AuthController@postRegister'); // Proses Register

Route::get('/logout', 'Auth\AuthController@getLogout'); // Proses Logout





Route::get('/setmoney', function(){

});

/*
|------------------------------------------------------------------------
| Income Routes
|------------------------------------------------------------------------
*/

Route::get('/income', 'IncomeController@index'); // Halaman Income
Route::get('/income/{id}', 'IncomeController@details'); // Halaman Detail Income
Route::get('/income/edit/{id}', 'IncomeController@edit'); // Halaman Edit Income
Route::get('/income/delete/{id}', 'IncomeController@delete'); // Proses Delete Income
Route::post('/income/save', 'IncomeController@save'); // Proses Simpan Income
Route::post('/income/update','IncomeController@update'); //  Proses Update Income

/*
|------------------------------------------------------------------------
| Spending Routes
|------------------------------------------------------------------------
*/

Route::get('/spending', 'SpendingController@index'); // Halaman Spending
Route::get('/spending/{id}', 'SpendingController@details'); // Halaman Detail Spending
Route::get('/spending/edit/{id}', 'SpendingController@edit'); // Halaman Edit Spending
Route::get('/spending/delete/{id}', 'SpendingController@delete'); // Proses Delete Spending
Route::post('/spending/save', 'SpendingController@save'); // Proses Simpan Spending
Route::post('/spending/update','SpendingController@update'); //  Proses Update Spending

/*
|------------------------------------------------------------------------
| Plans Routes
|------------------------------------------------------------------------
*/

Route::get('/plans', 'PlansController@index'); // Halaman Plans
Route::get('/plans/{id}', 'PlansController@details'); // Halaman Detail Plans
Route::get('/plans/edit/{id}', 'PlansController@edit'); // Halaman Edit Plans
Route::get('/plans/delete/{id}', 'PlansController@delete'); // Proses Delete Plans
Route::post('/plans/save', 'PlansController@save'); // Proses Simpan Plans
Route::post('/plans/update','PlansController@update'); //  Proses Update Plans

/*
|------------------------------------------------------------------------
| Statistic Routes
|------------------------------------------------------------------------
*/

Route::get('/stats','StatisticController@index');


?>
<!-- fc8c2e5238afca78fbf16c5b309710a30937bf54 -->
