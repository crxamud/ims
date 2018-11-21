<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Account extends Model
{
//Use Notifiable

	protected $table = 'accounts';
	 protected $fillable = [
       'id', 'account_no','name','user_id', 'date'
    ];

     public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('accounts');
    }
    
}

 ?>