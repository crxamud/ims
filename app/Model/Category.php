<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
//Use Notifiable

	protected $table = 'categories';
	 protected $fillable = [
        'name','user_id', 'date'
    ];

     public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('categories');
    }
    
}

 ?>