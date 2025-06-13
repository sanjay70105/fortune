<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cityStore(request $request)
    {
        $values = $request->validate([
            'state_id' => 'required|int',
            'city' => 'required|string',
        ]);
        $store = city::create([
            'state_id' => $values['state_id'],
            'city' => $values['city']
        ]);
        if ($store) {
            return response()->json([
                'success' => true,
                'message' => "data has been saved"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data not saved please try again'
            ]);
        }
    }
    public function fetchCity()
    {
        $data = city::all();
        if ($data) {
            return response()->json([
                'data' => $data
            ]);
        }
    }
}
