<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Type;

class CommentController extends Controller
{
    public function createComment(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        $allComments = Comment::all();




            $request->validate([
                'body' => 'required'
            ]);

            // Create new comment


            $comment = new Comment();
            $comment->body = $request->body;
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $post->id;
            $comment->save();





       return view('showComment', compact('post','user','allComments'));

    }


}
