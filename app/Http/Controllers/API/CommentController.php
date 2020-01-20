<?php

namespace App\Http\Controllers\API;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

//        $comment = new Comment();
//        $comment->user_id =  $request->user_id;
//        $comment->comment = $request->comment;
//        $comment->save();
        $comment = new Comment();
        $comment->comment = $request->comment;
        $user=User::findOrFail($request->id);
        $user->comments()->save($comment);
    }
}
