<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Posts extends Controller
{
    public function index(Request $request) {
        $posts = Post::with(
            'user',
            'comments',
            'favorites'
        )->paginate(25);

        return [
            'posts' => $posts,
        ];
    }

    public function view($id) {
        return Post::with(
            'user',
            'comments',
            'comments.user',
            'favorites'
        )->findOrFail($id);
    }
}
