<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject

{

    protected $hidden = [
        'password','email_verified_at','created_at','updated_at'
    ];

    protected $fillable =[
        'name','email','password','email_verified_at'
    ];

    public function Items(){
        return $this->hasMany(Item::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    
}
