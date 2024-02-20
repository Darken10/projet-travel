<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Models\Root\Province;
use App\Http\Controllers\Controller;
use App\Http\Requests\Root\ProvinceFormRequest;

class ProvinceController extends Controller
{
    /**
    * Display a listing of the resource.
    */

    public function index()
    {
        $provinces = Province::latest()->paginate(10);

        return view('root.province.index',[
            'provinces'=> $provinces,
        ]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $province = new Province();
        return view('root.province.formulaire',[
            'province'=> $province,
        ]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store( ProvinceFormRequest $request )
    {
        $data = $request->validated();
        Province::create($data);
        return to_route('root.province.index')->with('success','Votre étiquette bien été crée');
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Province $province)
    {
       //$province = Province::findOrFail($province);
        return view('root.province.formulaire',[
            'province'=> $province,
        ]);
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ProvinceFormRequest $request,Province $province)
    {  
       //$province = Province::findOrFail($province);
        $data = $request->validated();
        $province->update($data);
        return to_route('root.province.index')->with('success','Votre étiquette bien été mise a jours');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Province $province)
    {
       //$province = Province::findOrFail($province);
        $province->delete();

        return to_route('root.province.index')->with('success','Votre étiquette bien été supprimée');

    }
}
