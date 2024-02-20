<?php

namespace App\Http\Controllers\Api\Post;

use App\Models\Post\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\TagFormRequest;

class ApiTagController extends Controller
{
    
    public function create(Request $request)
    {
        
        $data = $request->validate([
            'name'=>['required','string','min:2','max:50'],
            'user_id'=>['required','exists:users,id']
        ]);
        $tag = Tag::create($data);

        return response()->json([
            'tag'=> $tag
        ]);
    }

    function index(){
        return response()->json([
            'tags'=> Tag::all(),
        ]);
    }
}
