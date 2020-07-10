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
        //$logged_user = User::find(auth('api')->user()->id);

        return UserIndexResource::collection(
           // $logged_user->users->all()
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
         //$logged_user = User::find(auth('api')->user()->id);
        $data = $request->all();
        $rules =[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'type' => 'required|in:manager,administrator,super',
            'language' => 'string',
            'timezone' => 'required|timezone',
            
        ];

        $validator= Validator::make($data,$rules, Messages::getMessages());
        
        if($validator->fails()){
            return response($validator->errors(),422);
            
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
        //$logged_user = User::find(auth('api')->user()->id);
        return new UserIndexResource(User::findOrFail(
           // $logged_user->users($user->id)
            $user->id
        ));
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
            
        ];


        $validator= Validator::make($data,$rules, Messages::getMessages());
        if($validator->fails()){
            return response($validator->errors(),422);
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
        return new UserIndexResource($user);

    }
}
