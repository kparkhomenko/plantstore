<?php

namespace App\Http\Controllers;

use App\Http\Requests\plantRequest;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function plant_addition(plantRequest $req) {
        $req->file('path')->store('public/plant_img');
        $img_name = $req->file('path')->hashName();
        Plant::create(array_merge($req->validated(), ['path' => $img_name]));
        $success_message = $req->session()->put('success_message', 'Товар добавлен');
        return redirect()->back()->with($success_message);
    }
}
