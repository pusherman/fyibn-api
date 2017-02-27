<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class Comments extends Controller
{
    public function create(Request $request) {
        return Post::findOrFail($request->get('post_id'))
          ->comments()
          ->create([
            'body' => $request->get('body'),
            'user_id' => $request->user()->id
          ]);
    }
}
