<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Purchase extends Model
{
	//use Notifiable;
    protected $table = 'products';
    protected $fillable = [
        'name', 'quantity', 'unitPrice','total','userid','date'
    ];

    public $timestamps = false;
     public static function columns(){
     	return DB::getSchemaBuilder()->getColumnListing('products');
    }
}
 ?>