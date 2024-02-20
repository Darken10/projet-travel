<?php

namespace App\Http\Controllers\Root;

use App\Models\Root\Pays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Root\PaysFormRequest;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $pays = Pays::latest()->paginate(10);
 
         return view('root.pays.index',[
             'pays'=> $pays,
         ]);
     }
 
     /**
      * Show the form for creating a new resource.
     */
     public function create()
     {
         $pays = new Pays();
         return view('root.pays.formulaire',[
             'pays'=> $pays,
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
     */
     public function store( PaysFormRequest $request )
     {
         $data = $request->validated();
         Pays::create($data);
         return to_route('root.pays.index')->with('success','Votre étiquette bien été crée');
     }
 
 
     /**
      * Show the form for editing the specified resource.
     */
     public function edit($pays)
     {
         
        $pays = Pays::findOrFail($pays);
         return view('root.pays.formulaire',[
             'pays'=> $pays,
         ]);
     }
 
     /**
      * Update the specified resource in storage.
     */
     public function update(PaysFormRequest $request, $pays)
     {  
        $pays = Pays::findOrFail($pays);
         $data = $request->validated();
         $pays->update($data);
         return to_route('root.pays.index')->with('success','Votre étiquette bien été mise a jours');
     }
 
     /**
      * Remove the specified resource from storage.
     */
     public function destroy($pays)
     {
        $pays = Pays::findOrFail($pays);
         $pays->delete();
 
         return to_route('root.pays.index')->with('success','Votre étiquette bien été supprimée');
 
     }
 
}
