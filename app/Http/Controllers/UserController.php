<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::select('users.*')
        ->leftJoin('posts', 'users.post_id', '=', 'posts.id')
        ->get();
    }
}
