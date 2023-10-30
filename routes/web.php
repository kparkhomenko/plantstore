<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\cartController;
use App\Models\Plant;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('mainpage');
})->name('mainpage');

Route::get('mainpage', function () {
    $plants = Plant::orderBy('id')->paginate(6);
    $comments = Comment::latest()->paginate(3);
    return view('mainpage', compact('plants', 'comments'));
})->name('mainpage');

Route::get('plant/{id}', function ($id) {
    $plant = Plant::find($id);
    $comments = Comment::latest()->paginate(3);
    return view('plantpage', compact('plant', 'comments'));
});
Route::get('sendComment', [commentController::class, 'send'])->name('sendComment');
Route::get('addCart', [cartController::class, 'send'])->name('addCart');

Route::get('register', function () {
    return view('registration');
})->name('register');
Route::post('register', [registrationController::class, 'add_user'])->name('user_register');

Route::get('login', function () {
    if (Auth::check()) {
        return redirect('cart/' . Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'let_user_in'])->name('user_login');

Route::get('logout', function () {
    Auth::logout();
    return redirect('register');
})->name('logout');

Route::get('cart/{id}', function ($id) {
    if (Auth::check()) {
        if (Auth::user()->id == $id) {
            $user = Auth::user()->id;
            $cart_items = DB::select("SELECT plants.*, carts.id AS 'cart_id' FROM `carts` left join plants ON plants.id = carts.plant_id WHERE plants.id = carts.plant_id AND carts.user_id = $user  order by plants.id;");
            return view('cart', compact('user', 'cart_items'));
        } 
        return redirect('mainpage');
    }
    return redirect('mainpage');
})->name('cart');
Route::get('deleteCartPlant', [cartController::class, 'delete'])->name('deleteCartPlant');

Route::get('adminpanel', function () {
    if (Auth::check()) {
        if (Auth::user()->status == 'admin') {
            return view('adminpanel');
        }
    }
    return redirect('mainpage');
})->name('adminpanel');

Route::get('addplant', function () {
    if (Auth::check()) {
        if (Auth::user()->status == 'admin') {
            return view('addplant');
        }
    }
    return redirect('mainpage');
})->name('addplant');

Route::post('', [PlantController::class, 'plant_addition'])->name('plant_upload');