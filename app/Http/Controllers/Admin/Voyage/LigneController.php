<?php

namespace App\Http\Controllers\Admin\Voyage;

use App\Models\Voyage\Ligne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Voyage\LigneFormRequest;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        $lignes = Ligne::latest()->paginate(12);
         return view('admin.voyage.ligne.index',[
             'lignes'=> $lignes,
         ]);
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         $ligne = new Ligne();
         return view('admin.voyage.ligne.formulaire',[
             'ligne'=> $ligne,
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(LigneFormRequest $request)
     {
         $data = $request->validated();
         $data['user_id']=Auth::user()->id;
         $ligne = Ligne::query()->where('depart_id',$data['depart_id'])->where('destination_id',$data['destination_id'])->get();
         if(!$ligne->isEmpty()){
            return to_route('admin.voyage.ligne.index')->with('warning','La ligne existe deja');
        }
         Ligne::create($data);
         return to_route('admin.voyage.ligne.index')->with('success','Votre article bien été creer');
     }
 
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Ligne $ligne)
     {
         //$ligne = new Ligne();
         return view('admin.voyage.ligne.formulaire',[
             'ligne'=> $ligne,
         ]);
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(LigneFormRequest $request, Ligne $ligne)
     {
         $data = $request->validated();
         $data['user_id'] = Auth::user()->id;
         $ligne->update($data);
         return to_route('admin.voyage.ligne.index')->with('success','Votre article bien été mis a jours');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Ligne $ligne)
     {
         $ligne->delete();
         return to_route('admin.voyage.ligne.index')->with('success','Votre article bien été supprimer');
 
     }
 
 
     function likeListLigne(Ligne $ligne)
     {
         
         return view('admin.voyage.ligne.like.list', [
             'likes' => $ligne->likes()->latest()->paginate(50),
         ]);
     }
}
