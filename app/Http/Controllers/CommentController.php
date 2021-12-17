<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Type;

class CommentController extends Controller
{
    // Kreiranje komentara za odredjeni post
    public function createComment(Request $request, $id)
    {

            $post = Post::find($id);
            $user = Auth::user();



            $request->validate([
                'body' => 'required'
            ]);

            // Create new comment

            $comment = new Comment();
            $comment->body = $request->body;
            $comment->sender_id = Auth::user()->id;
            $comment->post_id = $post->id;
            $comment->save();




            return redirect()->back();


    }

    // Brisanje komentara

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }


}
