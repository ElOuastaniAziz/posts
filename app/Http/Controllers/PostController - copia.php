<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index(){
        //$post=Post::find(1);//devuelve un post
        //$posts=Post::get();//devuelve todos los posts o una collection

       $posts=Post::latest()->with(['user','likes'])->paginate(20);
        return view('posts.index',['posts'=>$posts]);
    }

    public function store(Request $request){
       // dd('ok');
       //Validación
       $this->validate($request,[
           'body'=>'required'
       ]);

       //alamcenamiento
        /*$request->user()->posts()->create([
            //No hace falta crear el id de usuario, ya que lo hace automáticamente.
            'body'=>$request->body
        ]);*/

        $request->user()->posts()->create($request->only('body'));

        return back();// nos devuelve a la última página
      /* Post::create([
            'user_id'=>$request->auth->id(),// Otra forma es'user_id'=>
            //$request->auth->user()->id(),
           'body'=>$request->body
       ]);*/
    }


    public function destroy(Post $post){

      if(!$post->ownedBy(auth()->user())){
        dd('no');
      }

      $post->delete();

        return back();
    }
}
