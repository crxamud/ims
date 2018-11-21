<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Supplier extends Model
{
	//use Notifiable;
    protected $table = 'suppliers';
    protected $fillable = [
        'name', 'address', 'tell','username','date'
    ];

    public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('menues');
    }
}
 ?>
