<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $com = Auth::user()->compagnie;
        $posts = Post::where('user_id',Auth::user()->id)->latest()->paginate(12);

        return view('admin.post.index',[
            'posts'=> $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        return view('admin.post.formulaire',[
            'post'=> $post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        
        $data['user_id']=Auth::user()->id;
        $post = Post::create($data);
        if(!empty($data['tags'])){
            $post->tags()->sync($data['tags']);
        }
        $this->registerPostImages($request,$post);
        $post->save();

        return to_route('admin.post.index')->with('success','Votre article bien été creer');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //$post = new Post();
        return view('admin.post.formulaire',[
            'post'=> $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $this->registerPostImages($request,$post);
        
        $post->update($data);
        return to_route('admin.post.index')->with('success','Votre article bien été mis a jours');
    }

    function registerPostImages(PostFormRequest $request,Post $post){
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $img = Image::create([
                    'url'=>Storage::url($image->store('public/post/images')),
                ]);
                if($img->id){
                    $post->images()->attach($img);
                }
            }
        }
    }

    function deleteImages(Post $post,Image $image){
       if(Storage::delete($image->url) && $post->images()->detach($image) && $post->save()){
            $image->delete();
            return back()->with('success','Votre image a bien ete efface');
       }
       return back()->with('error','Desoler nous n\'avons pas put effacer votre image');


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.post.index')->with('success','Votre article bien été supprimer');

    }


    function likeListPost(Post $post)
    {
        
        return view('admin.post.like.list', [
            'likes' => $post->likes()->latest()->paginate(50),
        ]);
    }


    

}
