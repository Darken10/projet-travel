<?php

namespace App\Http\Controllers\Root;

use App\Models\Root\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Root\VilleFormRequest;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $villes = Ville::latest()->paginate(10);
 
         return view('root.ville.index',[
             'villes'=> $villes,
         ]);
     }
 
     /**
      * Show the form for creating a new resource.
     */
     public function create()
     {
         $ville = new Ville();
         return view('root.ville.formulaire',[
             'ville'=> $ville,
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
     */
     public function store( VilleFormRequest $request )
     {
         $data = $request->validated();
         Ville::create($data);
         return to_route('root.ville.index')->with('success','Votre étiquette bien été crée');
     }
 
 
     /**
      * Show the form for editing the specified resource.
     */
     public function edit(Ville $ville)
     {
         //$ville = new Ville();
         return view('root.ville.formulaire',[
             'ville'=> $ville,
         ]);
     }
 
     /**
      * Update the specified resource in storage.
     */
     public function update(VilleFormRequest $request, Ville $ville)
     {
         $data = $request->validated();
         $ville->update($data);
         return to_route('root.ville.index')->with('success','Votre étiquette bien été mise a jours');
     }
 
     /**
      * Remove the specified resource from storage.
     */
     public function destroy(Ville $ville)
     {
         $ville->delete();
 
         return to_route('root.ville.index')->with('success','Votre étiquette bien été supprimée');
 
     }
 
}
