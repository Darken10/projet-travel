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
            return to_route('admin.voyage.ligne.index')->with('warning','La ligne existe déja.Nous ne pouvont pas la récréer.');
        }
         if($ligne = Ligne::create($data)){
             return to_route('admin.voyage.ligne.index')->with('success',"La ligne {{ $ligne->departName() }} - {{ $ligne->destinationName() }} bien été creer");
         }
        
        return back()->with('error',"Désolé une erreur inconnue est survenue lors du traitment des données");
     }
 
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Ligne $ligne)
     {
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
         $exDep  = $ligne->departName();
         $exDest = $ligne->destinationName();   
         if($ligne->update($data)){
            return to_route('admin.voyage.ligne.index')->with('success',"La ligne {{ $exDep }} - {{ $exDest }} a bien été mise à jours");
         }

        return back()->with('error',"Désolé une erreur inconnue est survenue lors du traitment des données");

         
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Ligne $ligne)
     {
         if($ligne->delete()){
            return to_route('admin.voyage.ligne.index')->with('success','Votre article bien été supprimer');
         }
         return back()->with('error',"Désolé une erreur inconnue est survenue lors du traitment des données");
 
     }
 
 
     function likeListLigne(Ligne $ligne)
     {
         return view('admin.voyage.ligne.like.list', [
             'likes' => $ligne->likes()->latest()->paginate(50),
         ]);
     }
}
