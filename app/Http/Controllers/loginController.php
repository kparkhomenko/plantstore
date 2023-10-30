<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class loginController extends Controller
{
    public function let_user_in(loginRequest $req){
        
        $formFields = $req->only(['login', 'password']);

        if(Auth::attempt($formFields)){
            $user = User::where("login", $formFields['login'])->get();
            return redirect('mainpage');
        }

        return redirect(route('login'))->withErrors([
            'formError' => 'Неверный логин или пароль'
        ]);
    }
}
