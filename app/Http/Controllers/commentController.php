<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
 public function send(Request $req)
    {
        if (isset($req->plant_id)) {
            Comment::create(['plant_id' => $req->plant_id, 'user_login' => Auth::user()->login, 'user_id' => Auth::user()->id, 'text' => $req->text]);
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('plant_id', '=', $req->plant_id)
            ->select('comments.id', 'comments.user_id', 'comments.user_login', 'comments.text')
            ->paginate(20);
            $view = view('components.comments', compact('comments'));
            return $view;
        } else {
            return redirect()->back();
        }
    }
}
