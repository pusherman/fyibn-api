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
            'latestComment',
            'commentCount'
        )->paginate(25);

        return [
            'totalCount' => 1,
            'posts' => $posts,
        ];
    }

    public function view($id) {
        return Post::with('comments')
            ->findOrFail($id);
    }
}
