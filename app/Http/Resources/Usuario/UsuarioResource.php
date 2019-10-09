<?php

namespace App\Http\Resources\Usuario;

use App\Model\Usuario;
use App\Model\Item;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'item'=> function(){
                return json(Usuario::find($this->id)->Items);
            },
        ];
    }
}
