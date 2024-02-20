<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ticket;
use App\Models\Compagnie;
use App\Models\Root\Ville;
use App\Models\Voyage\Ligne;
use Illuminate\Http\Request;
use App\Models\Voyage\Course;
use App\Models\Voyage\Voyage;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Ticket\TicketRequest;
use App\Http\Requests\Voyage\SearchFormRequest;

class VoyageController extends Controller
{
    function index(){
        $voyages = Voyage::orderBy('heure_depart','desc')->paginate(12);
        return view('voyage.index',[
            'voyages' => $voyages
        ]);
    }

    function search(SearchFormRequest $request){
        $data = $request->validated();
        $voyages = Voyage::query();
        if($a = $data['compagnie']){
            $compagnies = Compagnie::orWhere('name','like',"%$a%")->orWhere('sigle','like',"%$a%")->get();
            $compagnies_id = [];
            foreach ($compagnies as $compagnie){
                $compagnies_id[]=$compagnie->id;
            }
            //dd($compagnies_id);

            $voyages = $voyages->whereIn('compagnie_id',$compagnies_id);
            //dd($voyages);
        }

        if($a = $data['depart']){
            $villes = Ville::orWhere('name','like',"%$a%")->get();
            $villes_id = [];
            foreach ($villes as $ville){
                $villes_id[] = $ville->id;
            }
            
            
            $lignes = Ligne::query()->whereIn('depart_id',$villes_id)->get();
            
            $lignes_id = [];
            foreach($lignes as $ligne){
                $lignes_id[] = $ligne->id;
            }

            
            $courses = Course::whereIn('ligne_id',$lignes_id)->get();

            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            
            $voyages = $voyages->whereIn('course_id',$courses_id);
            
        }

        if($a = $data['destination']){
            $villes = Ville::orWhere('name','like',"%$a%")->get();
            $villes_id = [];
            foreach ($villes as $ville){
                $villes_id[] = $ville->id;
            }
            
            $lignes = Ligne::query()->whereIn('destination_id',$villes_id)->get();
            
            $lignes_id = [];
            foreach($lignes as $ligne){
                $lignes_id[] = $ligne->id;
            }
            $courses = Course::whereIn('ligne_id',$lignes_id)->get();

            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            $voyages = $voyages->whereIn('course_id',$courses_id);
            
        }

        if($a = $data['heure']){
            $courses = Course::orWhere('heure_depart','>=',"$a")->get();
            $courses_id = [];
            foreach($courses as $course){
                $courses_id[] = $course->id;
            }
            $voyages = $voyages->whereIn('course_id',$courses_id);
        }

        $voyages = $voyages->get();
        //dd($voyages);
        
        return view('voyage.index',[
            'voyages' => $voyages
        ]);
    }


    public function show(Voyage $voyage){
        
        return view('voyage.show',[
            'voyage' => $voyage
        ]);
    }


    public function reserver(Voyage $voyage,TicketRequest $request){

        /** @var Array $a le tableau des 'id' de la liste des voyage de la compagnie */
        $a = Voyage::query()->where('compagnie_id',$voyage->compagnie_id)->get()->pluck('id');
        /** @var Array $n le tableau de tout les ticket voyage de la compagnie */
        $n = Ticket::query()->whereIn('voyage_id',$a)->get();
        $annee = new DateTime();
        
        $numeroTk = 'Tk'.$annee->format('y').'-'.$voyage->compagnie_id.'-'.count($n)+1;
        $data = [
            'user_id'=>$request->user()->id,
            'voyage_id' => $voyage->id,
            'numero' => $numeroTk,
            'code'=> count($n)+1,
            'statut_id' => 11
        ] ;
        Ticket::create($data);
        
        return Redirect::route('ticket.mes-tickets')->with('status', 'profile-updated');

        
    }

}
