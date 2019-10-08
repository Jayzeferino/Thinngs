<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public function Items(){
        return $this->hasMany(Item::class);
    }
}
