<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserIndexResource;

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
        $data = $request->all();
        $rules =[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'type' => 'required|in:manager,administrator,super',
            'language' => 'string',
            'timezone' => 'required|timezone',
            'currency_id' => 'required|exists:currencies,id'
        ];

        $validator= Validator::make($data,$rules, Messages::getMessages());
        
        if($validator->fails()){
            return $validator->errors();
        }else{
            $pas = User::make_password();
            $GLOBALS['password_pivote'] = $pas;
            $data['password'] = bcrypt($pas);
            $user = User::create($data);
        
            return new UserIndexResource(User::findOrFail($user->id));
        }
        
        
        
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
        
        $data = $request->all();
        $rules =[
            'name' => 'string',
            'email' => 'email|unique:users,email,'.$user->id,
            'type' => 'in:manager,administrator,super',
            'language' => 'string',
            'timezone' => 'timezone',
            'currency_id' => 'exists:currencies,id'
        ];


        $validator= Validator::make($data,$rules, Messages::getMessages());
        if($validator->fails()){
            return $validator->errors();
        }else{
            $data = $request->all();
            $pas = User::make_password();
            $GLOBALS['password_pivote'] = $pas;
            $data['password'] = bcrypt($pas);
            $user->update($data);
            return new UserIndexResource(User::findOrFail($user->id));
        }     
       
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
