<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class AccountsInfo extends Model
{
//Use Notifiable

	protected $table = 'accountsifno';
	 protected $fillable = [
       'id', 'account_no','describtion','Dr','Cr','Balance','user_id', 'date'
    ];

     public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('accountsifno');
    }
    
}

 ?>