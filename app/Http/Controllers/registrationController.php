<?php

namespace App\Http\Controllers;

use App\Http\Requests\registrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registrationController extends Controller
{
    public function add_user(registrationRequest $req) {
    $user = User::create(array_merge($req->validated(), ['password' => Hash::make($req->password), 'status' => 'user']));
        if($user){
            Auth::login($user);
            return redirect('mainpage');
        }
    }
}
