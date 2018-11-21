<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
//Use Notifiable

	protected $table = 'products';
	 protected $fillable = [
       'id', 'cat_id','subcat_id','quantity','unit_price','amount','supplier_id','account_no','user_id', 'date'
    ];

     public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('products');
    }
    
}

 ?>