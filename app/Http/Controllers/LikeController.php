<?php

namespace App\Http\Controllers;

use App\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $likes = Likes::where()->orderBy('id', 'desc')
                        ->paginate(10);

        return view('like.index', [
            'likes' => $likes
        ]);
    }

    public function like($image_id){
        $user = Auth::user();

        $isset_like = Likes::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->count();
        if($isset_like == 0){
            $like = new Likes();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
            $like->save();

            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'El Like Ya Existe'
            ]);
        }
    }

    public function dislike($image_id){
        $user = Auth::user();

        $like = Likes::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->first();
        if($like){
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'No Me Gusta Puesto Correctamente'
            ]);
        }else{
            return response()->json([
                'message' => 'El Like No Existe'
            ]);
        }
    }
}