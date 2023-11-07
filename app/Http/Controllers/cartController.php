<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function send(Request $req) {
        if(isset($req->plant_id)) {
            Cart::create(['plant_id' => $req->plant_id, 'user_id' => Auth::user()->id]);
        } else {

        }
    }

    public function delete(Request $req) {
        Cart::where('id', '=', $req->id)->delete();
    }
}
