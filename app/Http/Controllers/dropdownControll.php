<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class dropdownControll extends Controller
{
	function fillList(){
		$names = DB::table('categories')->get();
		return view('/createpurchase')->with("names",$names);
	}
}
