<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class History extends Controller
{
    /**
     * Get all history records for our user
     */
    public function index(Request $request)
    {
      $user_id = $request->user()->id;
      $history = \App\History::where('user_id', '=', $user_id)
        ->get(['user_id', 'post_id', 'created_at']);

      return [ 'history' => $history ];
    }

        $post_id = $request->get('post_id');
        $user_id = $request->user()->id;

        return Post::findOrFail($post_id)
          ->history()
          ->create([ 'user_id' => $user_id ]);
    }

    public function delete(Request $request) {
        $post_id = $request->get('post_id');
        $user_id = $request->user()->id;

        $post = Post::findOrFail($post_id);

        $id = App\History::where('post_id', '=', $post->id)
          ->where('user_id', '=', $user_id)
          ->delete();

        return [
          'post_id' => $post_id,
          'id' => $id
        ];
    }
}
