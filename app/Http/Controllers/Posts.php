<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Posts extends Controller
{
    public function index(Request $request) {
        return Post::with('user', 'latestComment', 'commentCount')->get();
    }
}
