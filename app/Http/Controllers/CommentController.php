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
    public function createComment(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        $allComments = Comment::all();
        $allUsers = User::all();




            $request->validate([
                'body' => 'required'
            ]);

            // Create new comment


            $comment = new Comment();
            $comment->body = $request->body;
            $comment->sender_id = Auth::user()->id;
            $comment->post_id = $post->id;
            $comment->save();


            $sender = $allUsers->where($user->id , $comment->sender_id);

           // prekinuti ponavljanje loop

            dd($allComments);


       return view('singlePostView', compact('post','user','allComments','sender'));


    }


}
