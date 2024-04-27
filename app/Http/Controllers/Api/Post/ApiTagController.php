<?php

namespace App\Http\Controllers\Api\Post;

use App\Models\Post\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\TagFormRequest;
use App\Http\Requests\Api\Post\TagRequest;
use Exception;

class ApiTagController extends Controller
{
    
    public function create(TagRequest $request)
    {
        try {
            $data = $request->validated();
            $tag = Tag::create($data);
    
            return response()->json([
                'error'=>false,
                'success'=> true,
                'status_code'=> 200,
                'status_message'=> "L'étiquette a bien été ajouter",
                'data'=> [
                    'tag'=>$tag ,
                ]
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    function index(){
        return response()->json([
            'status_code'=> 200,
            'status_message'=> "La liste de tout les étiquettes",
            'data'=> [
                'tags'=> Tag::all(),
            ],
        ]);
    }

    function delete(Tag $tag){
        try {
            if($tag->delete()){
                return response()->json([
                    'error'=>false,
                    'success'=> true,
                    'status_code'=> 200,
                    'status_message'=> "L'etiquette a bien ete efface",
                ]);
            }
            return response()->json([
                'error'=>true,
                'success'=> false,
                'status_code'=> 422,
                'status_message'=> "L'etiquette n'a pas put etre efface",

            ]);
        }  catch (Exception $e) {
            return response()->json($e);
        }
    }
}
