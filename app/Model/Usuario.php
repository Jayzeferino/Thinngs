<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    public $hidden = ['password','email_verified_at','created_at','updated_at'];
    protected $fillable =['name','email','password','email_verified_at'];

    public function Items(){
        return $this->hasMany(Item::class);
    }
}
