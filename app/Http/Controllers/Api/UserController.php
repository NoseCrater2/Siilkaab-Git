<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserIndexResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserIndexResource::collection(
            User::all()
        );
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'type' => 'required|in:manager,administrator,super',
            'language' => 'string',
            'timezone' => 'required|timezone',
            'currency_id' => 'required|exists:currencies,id'
        ];

        $messages = [
            'name.required' => 'Nombre es requerido',
            'last_name.string' => 'Apellido no puede quedar vacío',
            'language.string' => 'Lenguaje no puede quedar vacío',
            'email.required' => 'Email es requerido',
            'email.email' => 'Debe ser un Email válido',
            'email.unique' => 'Este Email ya está registrado en el sistema',
            'type.required' => 'El Tipo es requerido',
            'type.in' => 'El tipo debe ser manager, administrator o super',
            'timezone.required' => 'Zona horaria es requerida',
            'timezone.timezone' => 'Debe ser una zona horaria válida',
            'currency_id.required' => 'Moneda es requerida',
            'currency_id.exists' => 'Debe ser un id válido de moneda',
        ];

        $data= $this->validate($request,$rules, $messages);
        
        $data = $request->all();
        $pas = User::make_password();
        $GLOBALS['password_pivote'] = $pas;
        $data['password'] = bcrypt($pas);
        $user = User::create($data);
        
        return new UserIndexResource(User::findOrFail($user->id));
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserIndexResource(User::findOrFail($user->id));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $rules =[
            'name' => 'string',
            'email' => 'email|unique:users,email,'.$user->id,
            'type' => 'in:manager,administrator,super',
            'language' => 'string',
            'timezone' => 'timezone',
            'currency_id' => 'exists:currencies,id'
        ];

        $messages = [
            'name.string' => 'Nombre es requerido',
            'language.string' => 'Lenguaje no puede quedar vacío',
            'email.email' => 'Debe ser un Email válido',
            'email.unique' => 'Este Email ya está registrado en el sistema',
            'type.in' => 'El tipo debe ser manager, administrator o super',
            'timezone.timezone' => 'Debe ser una zona horaria válida',
            'currency_id.exists' => 'Debe ser un id válido de moneda',
        ];

        $data= $this->validate($request,$rules, $messages);
                
        $data = $request->all();
        $pas = User::make_password();
        $GLOBALS['password_pivote'] = $pas;
        $data['password'] = bcrypt($pas);
        $user->update($data);
        return new UserIndexResource(User::findOrFail($user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
