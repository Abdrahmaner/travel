<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
    //      $rules = array(
    //             'Firstname' => 'string',
    //             'Lastname' => 'string',
    //             'email' => 'string',
    //             'city' => 'string',
    //             'role' => 'string',
    //         );
        
    //     $validator = validator::make($request->all(), $rules);
    //         if ($validator->fails()) {
    //             // return response()->json($validator->errors(), 401);
    //             return response(
    //                 [
    //                     // // 'key' => $validator->errors()->keys(),
    //                     'message' => $validator->errors()->first()
                        
    //                 ],
    //                 422
    //             );
    //         } 
    //         else{
                 
    //         }
            if($request->password)
       {
        
        $admins=User::find($id);
       $admins->Firstname = $request->firstname;
       $admins->Lastname = $request->lastname;
       $admins->email = $request->email;
       $admins->city = $request->city;
       $admins->role = $request->role;
       $admins->password = Hash::make($request->password);
       $admins->update();

      
       }else{
        
        $admins=User::find($id);
        $admins->Firstname = $request->firstname;
       $admins->Lastname = $request->lastname;
       $admins->email = $request->email;
       $admins->city = $request->city;
       $admins->role = $request->role;
       $admins->update();
       }
       
        
       return response()->json($admin, 200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
