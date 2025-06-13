<?php

namespace App\Http\Controllers;

use App\Models\detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detailStore(request $request){
        $validatedData = $request->validate([
    'name' => 'required|string|min:4',
    'dob' => 'required|date',
    'phone' => 'nullable|string',
    'email' => 'required|string|email|unique:details,email',
    'state' => 'required',
    'description' => 'required|string|min:10'
]);

        $create=detail::create([
            'name'=>$validatedData['name'],
            'dob'=>$validatedData['dob'],
            'phone'=>$validatedData['phone'],
            'email'=>$validatedData['email'],
            'state_id'=>$validatedData['state'],
            'description'=>$validatedData['description']
        ]);
        if($create){
            return response()->json([
                'success'=>true,
                'message'=>'data saved successfully'
            ]);
        }
        else{
             return response()->json([
                'success'=>false,
                'message'=>'data  not saved successfully'
            ]);
        }
    }
}
