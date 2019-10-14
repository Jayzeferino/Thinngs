<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Model\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\Usuario\UsuarioResource as UsuarioResource;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {    

            $data= [
                'name'=> $request->input("name"),
                'email'=> $request->input("email"),
                'password'=> bcrypt($request->input("password")),
                'email_verified_at' => now()];
        
        
        
        Usuario::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return Usuario::with(['items'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=Usuario::findOrFail($id);
        $data->name= $request->input("name");
        $data->email= $request->input("email");
        $data->password= bcrypt($request->input("password"));
        $data->email_verified_at = now();
        $data->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Usuario::findOrFail($id);
        $data->delete();
    }
}
