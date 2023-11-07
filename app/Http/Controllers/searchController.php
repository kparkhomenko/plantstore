<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class searchController extends Controller
{
    public function search(Request $req)
    {
        $plants = Plant::where([['name', 'like', '%' . $req->search_word . '%']])->get();
        return view('components.plants', compact('plants'));
    }
}
