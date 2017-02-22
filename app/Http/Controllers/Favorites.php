<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Favorites extends Controller
{
    public function create(Request $request) {
        return Post::findOrFail($request->get('post_id'))
          ->favorites()
          ->create([ 'user_id' => $request->user()->id ]);
    }
}
