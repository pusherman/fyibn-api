<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Favorite;

class Favorites extends Controller
{
    public function create(Request $request) {
        $post_id = $request->get('post_id');
        $user_id = $request->user()->id;

        return Post::findOrFail($post_id)
          ->favorites()
          ->create([ 'user_id' => $user_id ]);
    }

    public function delete(Request $request) {
        $post_id = $request->get('post_id');
        $user_id = $request->user()->id;

        $favorite_id = Favorite::findOrFail($post_id)
          ->where('post_id', '=', $post_id)
          ->where('user_id', '=', $user_id)
          ->delete();

        return [
          'post_id' => $post_id,
          'favorite_id' => $favorite_id
        ];
    }
}
