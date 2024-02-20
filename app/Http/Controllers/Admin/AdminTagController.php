<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagFormRequest;
use Illuminate\Support\Facades\Auth;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tags = Tag::latest()->paginate(10);

        return view('admin.tag.index',[
            'tags'=> $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $tag = new Tag();
        return view('admin.tag.formulaire',[
            'tag'=> $tag,
        ]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store( TagFormRequest $request )
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        Tag::create($data);
        return to_route('admin.tag.index')->with('success','Votre étiquette bien été crée');
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Tag $tag)
    {
        //$tag = new Tag();
        return view('admin.tag.formulaire',[
            'tag'=> $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(TagFormRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $tag->update($data);
        return to_route('admin.tag.index')->with('success','Votre étiquette bien été mise a jours');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return to_route('admin.tag.index')->with('success','Votre étiquette bien été supprimée');

    }
}
