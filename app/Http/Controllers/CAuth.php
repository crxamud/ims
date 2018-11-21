<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;
class CAuth extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public static function perms()
    {
    	return Menu::all();
    } 
}
