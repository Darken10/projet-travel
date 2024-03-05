<?php

namespace App\Http\Controllers\Admin\Voyage;

use App\Http\Controllers\Controller;
use App\Models\Voyage\Chemin;
use Illuminate\Http\Request;

class CheminController extends Controller
{
    function index(){
        $chemins = Chemin::query()->where('chemin_precedent')->get();
        $cs = [];
        foreach ($chemins as $chemin) {
            $c = [];
            while ($chemin->suivant !== null) {
                $c[] = $chemin->ville->name;
                $chemin = $chemin->suivant;
            }
            $cs[] = $c;
        }
        return view('admin.voyage.chemin.index',[
            'chemins'=>$cs,
        ]);
    }
}
