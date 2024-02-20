<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests\Root\CompagnieFormRequest;
use App\Models\Compagnie;
use Illuminate\Http\Request;

class CompagnieController extends Controller
{
    /**
    * Display a listing of the resource.
    */

    public function index()
    {
        $compagnies = Compagnie::latest()->paginate(10);

        return view('root.compagnie.index',[
            'compagnies'=> $compagnies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $compagnie = new Compagnie();
        return view('root.compagnie.formulaire',[
            'compagnie'=> $compagnie,
        ]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store( CompagnieFormRequest $request )
    {
        $data = $request->validated();
        $data['code'] = uniqid();
        //dd($data);
        $compagnie = new Compagnie();
        $compagnie->name = $data['name'];
        $compagnie->sigle = $data['sigle'];
        $compagnie->slogant = $data['slogant'];
        $compagnie->description = $data['description'];
        //$compagnie->patron_id = $data['patron_id'];
        $compagnie->code = $data['code'];
        $compagnie->save();
        //dd($compagnie);

        //Compagnie::create($data);
        return to_route('root.compagnie.index')->with('success','Votre étiquette bien été crée');
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Compagnie $compagnie)
    {
       //$compagnie = Compagnie::findOrFail($compagnie);
        return view('root.compagnie.formulaire',[
            'compagnie'=> $compagnie,
        ]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(CompagnieFormRequest $request,Compagnie $compagnie)
    {  
       //$compagnie = Compagnie::findOrFail($compagnie);
        $data = $request->validated();
        $compagnie->update($data);
        return to_route('root.compagnie.index')->with('success','Votre étiquette bien été mise a jours');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Compagnie $compagnie)
    {
       //$compagnie = Compagnie::findOrFail($compagnie);
        $compagnie->delete();

        return to_route('root.compagnie.index')->with('success','Votre étiquette bien été supprimée');

    }
}
