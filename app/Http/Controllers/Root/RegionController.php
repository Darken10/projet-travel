<?php

namespace App\Http\Controllers\Root;

use App\Models\Root\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Root\RegionFormRequest;

class RegionController extends Controller
{ 
    
    /**
    * Display a listing of the resource.
    */

    public function index()
    {
        $regions = Region::latest()->paginate(10);

        return view('root.region.index',[
            'regions'=> $regions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $region = new Region();
        return view('root.region.formulaire',[
            'region'=> $region,
        ]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store( RegionFormRequest $request )
    {
        $data = $request->validated();
        Region::create($data);
        return to_route('root.region.index')->with('success','Votre étiquette bien été crée');
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Region $region)
    {
       //$region = Region::findOrFail($region);
        return view('root.region.formulaire',[
            'region'=> $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(RegionFormRequest $request,Region $region)
    {  
       //$region = Region::findOrFail($region);
        $data = $request->validated();
        $region->update($data);
        return to_route('root.region.index')->with('success','Votre étiquette bien été mise a jours');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Region $region)
    {
       //$region = Region::findOrFail($region);
        $region->delete();

        return to_route('root.region.index')->with('success','Votre étiquette bien été supprimée');

    }
}
