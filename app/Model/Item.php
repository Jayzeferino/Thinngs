<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
   public $hidden=['id','usuario_id','created_at','updated_at'] ;
   protected $fillable =['name','usuario_id','datein','dateout','Status'];
    public function Usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id');
    }
}
