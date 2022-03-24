<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
        ]);
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'firstName'                 => 'required',
            'lastName'                  => 'required',
            'address'                   => 'required',
            'username'                  => 'required',
            'country'                   => 'required',
            'state'                     => 'required',
            'lga'                       => 'required',
            'contact*'                  => 'required|numeric',
            'email*'                    => 'required',
            'whatsapp'                  => 'required|numeric ',
            'dob*'                      => 'required|date|before::today',
            'gender'                    => 'required',
            'religion'                  => 'required',
            'marital_status'            => 'required',
            'nextOfKin_name'            => 'required',
            'nextOfKin_contact'         => 'required|numeric',
            'nextOfKin_address'         => 'required',
            'nextOfKin_relationship'    => 'required',
            'guarantor_name'            => 'required',
            'guarantor_phone'           => 'required|numeric',
            'guarantor_address'         => 'required',
            'guarantor_position'        => 'required',
            'guarantor_company_name'    => 'required',
        ]);

        $user = new User;

        $user->firstname         = $request->firstName;
        $user->lastName          = $request->lastName;
        $user->address           = $request->address;
        $user->username          = $request->username;
        $user->country           = $request->country;
        $user->state             = $request->state;
        $user->lga               = $request->lga;
        $user->contact           = $request->contact;
        $user->email             = $request->email;
        $user->whatsapp_number   = $request->whatsapp_number;
        $user->date_of_birth     = $request->date_of_birth;
        $user->gender            = $request->gender;
        $user->religion          = $request->religion;
        $user->marital_status    = $request->marital_status;
        $user->nextOfKin_name    =$request->nextOfKin_name;
        $user->nextOfKin_contact     = $request->nextOfKin_contact;
        $user->nextOfKin_address     = $request->nextOfKin_address;
        $user->nextOfKin_relationship    = $request->nextOfKin_relationship;
        $user->guarantor_name               = $request->guarantor_name;
        $user->guarantor_phone           = $request->guarantor_phone;
        $user->guarantor_address         = $request->guarantor_address;
        $user->guarantor_position        = $request->guarantor_position;
        $user->guarantor_company_name    = $request->guarantor_company_name;

        $user = save();

        return response()->json([
            'status' => true,
            'data'  => [
                'user'   => $user
            ]
        ]);
    }

    public function updateUser(Request $request, $id)
    {
       $user = User::find($id);

       if(!$user) return response()->json([
           'status' => false,
           'message' => 'User does not exists'
       ], 404);

       $user->firstname         = $request->firstName;
        $user->lastName          = $request->lastName;
        $user->address           = $request->address;
        $user->username          = $request->username;
        $user->country           = $request->country;
        $user->state             = $request->state;
        $user->lga               = $request->lga;
        $user->contact           = $request->contact;
        $user->email             = $request->email;
        $user->whatsapp_number   = $request->whatsapp_number;
        $user->date_of_birth     = $request->date_of_birth;
        $user->gender            = $request->gender;
        $user->religion          = $request->religion;
        $user->marital_status    = $request->marital_status;
        $user->nextOfKin_name    =$request->nextOfKin_name;
        $user->nextOfKin_contact     = $request->nextOfKin_contact;
        $user->nextOfKin_address     = $request->nextOfKin_address;
        $user->nextOfKin_relationship    = $request->nextOfKin_relationship;
        $user->guarantor_name               = $request->guarantor_name;
        $user->guarantor_phone           = $request->guarantor_phone;
        $user->guarantor_address         = $request->guarantor_address;
        $user->guarantor_position        = $request->guarantor_position;
        $user->guarantor_company_name    = $request->guarantor_company_name;

        $user = save();


        return response()->json([
            'status' => true,
            'message' => 'Updaated Successfully!',
            'data' => $user
        ]);
       
    }
}
