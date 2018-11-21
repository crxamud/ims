<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Menu;
use DB;
use Response;
use \App\User;
use \App\Model\Account;
use \App\Model\Category;
use \App\Model\SubCategory;
use \App\Model\Product;
use \App\Model\Supplier;
class manageController extends Controller
{
    public function view(Request $data)
    {
    	if ($data->table=="User") {
    		$table ='\App\\'.$data->table;
    	  	}else if ($data->table=="Purchase"){
    	   $table ='\App\Model\\'.$data->table;
        }
           else{
             $table ='\App\Model\\'.$data->table;
       }
    
    $rows = $table::all();
    $columns =  $table::columns();
   	return view('manage.main',compact("rows"))->with("columns",$columns);
    }
    public 	function load(Request $ds){
        $data ;
    	if ($ds->table=="User") {
            $table ='\App\\'.$ds->table;
            $data = $table::all();
    $columns =  $table::columns();
            }elseif ($ds->table=="Product") {
             //categories
                //subcategories
                //users->auth
                //supliers
                $data = Product::join('users','users.id','=','products.user_id')
                                ->join('suppliers','suppliers.id','=','products.supplier_id')
                                ->join('categories','categories.id','=','products.cat_id')
                                ->join('subcategories','subcategories.id','=','products.subcat_id')
                                ->select('products.*','users.name','suppliers.name as sub_name','categories.name as cat_name','subcategories.name as subcat_name')
                                //->where()
                                ->get();
            }
           else{
             $table ='\App\Model\\'.$ds->table;
             $data = $table::all();
            $columns =  $table::columns();
           }
    
    
        $da = array(
    		'data' =>$data ,
    		'draw'=>1,
    		'iTotalRecords'=> count($data),
    		'iTotalDisplayRecords'=>count($data),
    );
     	return Response::json($da);
    }

    
    public function delete(Request $request){
    	User::destroy($request->id);
    	return Response::json(['success'=>true,'msg'=>'Successfully Deleted']);
    }

    public static function userupdate($id){
        return User::find($id);
    }
    public static function supplierUpdate($id){
        return Supplier::find($id);
    }
    public static function categoryUpdate($id){
        return Category::find($id);
    }
 public static function subcatUpdate($id){
        return SubCategory::find($id);
    }



    public static  function accountupdate($id)
    {
        return Account::find($id);
    }
}
