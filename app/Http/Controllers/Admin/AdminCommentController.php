<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Post\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\ReponseFormRequest;
use App\Models\Post\Reponse;
use Illuminate\Support\Facades\Auth;

class AdminCommentController extends Controller
{
    function index(Post $post)
    {

        return view('admin.post.comment.index', [
            'post' => $post,
        ]);
    }

    function show(Comment $comment)
    {
        return view('admin.post.comment.show', [
            'comment' => $comment,
        ]);
    }

    function storeReponse(ReponseFormRequest $request, Comment $comment){
        
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['comment_id'] = $comment->id;
        $data['is_admin'] = true;

        Reponse::create($data);
        return to_route('admin.comment.show',['comment'=>$comment])->with('success','Votre reponse a bien été envoyer');

    }
}
