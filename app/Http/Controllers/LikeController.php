<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Auth;

class LikeController extends Controller
{

    public function like($postId, Request $request){
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id= $postId;
        $like->save();

        return redirect()->route('index')->with('status', 'Bij favoriet toegevoegd');

    }
    //
}
