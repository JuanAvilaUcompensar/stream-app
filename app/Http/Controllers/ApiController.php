<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Qrcode;

use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //
    public function productos(Request $request)
    {
        if($request->has('id')){
            $id = $request->input('id');
            $productos = Qrcodes::where('id', $id)->get();
        }
        else{
            $productos = Qrcode::all();
        }

        return response()->json($productos);
    }
}
