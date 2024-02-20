<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post\Tag;
use App\Models\Post\Like;
use App\Models\Post\Comment;
use App\Models\Post\Reponse;
use Illuminate\Http\Request;
use App\Models\Post\LikeComment;
use App\Models\Post\LikeReponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\ReponseFromRequest;
use App\Http\Requests\Admin\Post\CommentFormRequest;
use App\Models\Root\Ville;
use App\Models\Voyage\Ligne;

class PostController extends Controller
{
    function index()
    {
        //dd(Ligne::find(1)->depart,Ligne::find(1)->destination);

        
        $posts = Post::latest()->paginate(12);
        //dd(Auth::user()->can('view',Post::find(10)));
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    function show(Post $post)
    {

        return view('post.show', [
            'post' => $post
        ]);
    }

    function storeComment(CommentFormRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post->id;

        if (Comment::create($data)) {
            return back()->with('success', 'Votre commentaire à bien été poste');
        } else {
            return back()->with('error', 'Une erreur est survenue');
        }
    }

    function reponse(Comment $comment)
    {

        return view('post.comment', ['comment' => $comment]);
    }


    function storeReponse(ReponseFromRequest $request, Comment $comment)
    {

        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['comment_id'] = $comment->id;

        if (Reponse::create($data)) {
            return back()->with('success', 'Votre reponse au commentaire de ' . $comment->user->name . ' à bien été postée');
        } else {
            return back()->with('error', 'Une erreur est survenue');
        }
    }

    function filterByTag(Tag $tag)
    {
        return view('post.index', [
            'posts' => $tag->posts()->latest()->paginate(12),
        ]);
    }


    function storeLikePost(Post $post)
    {

        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post->id;
        $like =  Like::where('user_id', $data['user_id'])
            ->Where('post_id', $data['post_id'])
            ->get();
        if (!$like->isEmpty()) {
            $like[0]->delete();
        } else {
            if (!Like::create($data)) {
                return back()->with('error', 'Nous n\'avons pas put enregistre votre like');
            }
        }

        return back();
    }


    function storeLikeComment(Comment $comment)
    {

        $data['user_id'] = Auth::user()->id;
        $data['comment_id'] = $comment->id;
        $like =  LikeComment::where('user_id', $data['user_id'])
            ->Where('comment_id', $data['comment_id'])
            ->get();
        if (!$like->isEmpty()) {
            $like[0]->delete();
        } else {
            if (!LikeComment::create($data)) {
                return back()->with('error', 'Nous n\'avons pas put enregistre votre like');
            }
        }

        return back();
    }

    function storeLikeReponse(Reponse $reponse)
    {

        $data['user_id'] = Auth::user()->id;
        $data['reponse_id'] = $reponse->id;
        $like =  LikeReponse::where('user_id', $data['user_id'])
            ->Where('reponse_id', $data['reponse_id'])
            ->get();
        if (!$like->isEmpty()) {
            $like[0]->delete();
        } else {
            if (!LikeReponse::create($data)) {
                return back()->with('error', 'Nous n\'avons pas put enregistre votre like');
            }
        }

        return back();
    }


    function likeList(Post $post)
    {

        return view('post.like.list', [
            'likes' => $post->likes()->latest()->paginate(50),
        ]);
    }
}
