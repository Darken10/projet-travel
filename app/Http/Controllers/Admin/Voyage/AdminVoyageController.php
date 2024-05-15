<?php

namespace App\Http\Controllers\Admin\Voyage;


use App\Models\Voyage\Ligne;
use Illuminate\Http\Request;
use App\Models\Voyage\Course;
use App\Models\Voyage\Voyage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Voyage\VoyageFormRequest;

class AdminVoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $voyages = Voyage::where('compagnie_id',Auth::user()->compagnie_id)->latest()->paginate(12);
        return view('admin.voyage.voyage.index', [
            'voyages' => $voyages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voyage = new Voyage();
        return view('admin.voyage.voyage.formulaire', [
            'voyage' => $voyage,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoyageFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['compagnie_id'] = Auth::user()->id;
        $ligne = Ligne::query()->where('depart_id', $data['depart_id'])->Where('destination_id', $data['destination_id'])->first();
        if ($ligne === null) {
            $ligne = Ligne::create($data);
        }
        $data['ligne_id'] = $ligne->id;

        $course = Course::query()->Where('ligne_id', $data['ligne_id'])->where('heure_depart', $data['heure_depart'])->Where('heure_arriver', $data['heure_arriver'])->first();
        if ($course === null) {
            $course = Course::create($data);
        }

        $dataV = [
            'prix'=> $data['prix'],
            'admin_id' => $request->user()->id,
            'course_id' => $course->id,
            'compagnie_id' => $request->user()->compagnie->id,
            'statut_id' => 1,
            'nombre_place' => $data['nombre_place'],
        ];
        $v = Voyage::create($dataV);

        if($v){
            return to_route('admin.voyage.voyage.index')->with('success', 'Votre voyage bien été creer');
        }else{
            return to_route('admin.voyage.voyage.create')->with('error', 'Une erreur est survenu lors de l\'enregistrement du voyage');
        }
 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voyage $voyage)
    {
        //$voyage = new Voyage();
        return view('admin.voyage.voyage.formulaire', [
            'voyage' => $voyage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoyageFormRequest $request, Voyage $voyage)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $ligne = Ligne::query()->where('depart_id', $data['depart_id'])->Where('destination_id', $data['destination_id'])->first();

        if ($ligne === null) {
            $ligne = Ligne::create($data);
        }
        $data['ligne_id'] = $ligne->id;

        $course = Course::query()->Where('ligne_id', $data['ligne_id'])->where('heure_depart', $data['heure_depart'])->Where('heure_arriver', $data['heure_arriver'])->first();
        if ($course === null) {
            $course = Course::create($data);
        }
        
        $dataV = [
            'prix'=> $data['prix'],
            'admin_id' => $request->user()->id,
            'course_id' => $course->id,
            'compagnie_id' => $request->user()->compagnie->id,
            'statut_id' => $data['statut_id'],
            'nombre_place' => $data['nombre_place'],
        ];

        $voyage->update($dataV);

        return to_route('admin.voyage.voyage.index')->with('success', 'Votre article bien été mis a jours');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voyage $voyage)
    {
        $voyage->delete();
        return to_route('admin.voyage.voyage.index')->with('success', 'Votre article bien été supprimer');
    }


    function likeListVoyage(Voyage $voyage)
    {

        return view('admin.voyage.voyage.like.list', [
            'likes' => $voyage->likes()->latest()->paginate(50),
        ]);
    }
}
