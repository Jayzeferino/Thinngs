<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function Usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id');
    }
}
