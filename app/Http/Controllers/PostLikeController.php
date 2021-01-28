<?php

namespace App\Http\Controllers;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Post;

class PostLikeController extends Controller
{
	public function __construct(){
		$this->middleware(['auth']);
	}
    public function store(Post $post,Request $request){
     	//dd($post->likedBy($request->user()));
     	if($post->likedBy($request->user())){

     		return response(null, 409);
     	}
        //Una vez hecho el like se le enviará un email al autor del post.

        if(!$post->likes()->onlyTrashed()->where('user_id',$request->user()->id)->count()){
            $user=auth()->user();
             Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));
        }
       
     	$post->likes()->create([
     		'user_id'=> $request->user()->id,
     	]);

     	return back();
     }
    public function destroy(Post $post,Request $request){
    		$request->user()->likes()->where('post_id',$post->id)->delete();
    		//$request->user(): devuelve todos los likes que el usuario ha hecho en una colección.
    		//->where('post_id',$post->id): con where filtramos la colección.
    		//delete es un métdo de la colleción creo. 
    		return back();
    }

}
