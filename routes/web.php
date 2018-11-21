<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/logout', 'Auth\loginController@logout');


Route::group([ 'middleware' => 'auth'], function(){
    Route::any('/add', 'AddController@Main')->name("Add");
    Route::any('/manage', 'manageController@view')->name("Manage");
    Route::any('/loadusers', 'manageController@load');
    Route::any('/delete', 'manageController@delete');
   Route::any('/create', 'AddController@create')->name("create");
   Route::any('/createSupplier','AddController@createSupplier')->name("New Supplier");
    Route::any('/createpurchase','AddController@createPurchase')->name("New Purchase");
    Route::any('/createCategory','AddController@createCategory')->name("New Category");
    Route::any('/subCategory','AddController@subCategory')->name("Sub Category");
    Route::any('/NewAccount','AddController@creatAccount')->name("New Account");
    Route::any('/AccountsInfo','AddController@accountsInfo')->name("Accounts Info");
    Route::any('/purchase','AddController@purchases')->name("Purchases");
    Route::any('/generalload','AddController@generalload');
    Route::any('/genenalSaver','AddController@genenalSaver');
  //  Route::any('/supplierUpdate','manageController@supplierUpdate');


});
