<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // this is for validation purposes//
    public function register(Request $request){
        $incomingFields= $request->validate([
            'name' => ['required','min:3','max:10',Rule::unique('users','name')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:8','max:200'],
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');   
    }
}
