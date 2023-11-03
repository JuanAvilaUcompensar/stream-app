<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Sanctum;

class TokenController extends Controller
{
    //
    public function generateToken(User $user)
    {



        $token = $user->createToken('token-name');


        $user->remember_token = $token->plainTextToken;
        $user->save();


        return redirect()-route('user,show', $user->id)->with('sucess', 'Token generado y guardado con exito.');
    }
}
