<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Menu extends Model
{
    //use Notifiable;
    protected $table = 'menues';
    protected $fillable = [
        'name', 'parent_id', 'url','icon'
    ];

    public $timestamps = false;
    public static function columns(){
    	return DB::getSchemaBuilder()->getColumnListing('menues');
    }
}
?>