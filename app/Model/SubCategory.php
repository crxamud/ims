<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class SubCategory extends Model
{
//Use Notifiable

	protected $table = 'subcategories';
	 protected $fillable = [
        'id','name', 'cat_id','user_id','date'
    ];

     public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('subcategories');
    }
    
}

 ?>