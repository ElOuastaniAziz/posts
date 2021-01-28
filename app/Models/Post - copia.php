<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

   protected $fillable = [
       'body',
   ];

   public function likedBy(User $user){

      return $this->likes->contains('user_id',$user->id);
      //likes devueleve una collection y contains es un método
      // de la collection.
   }

   public function ownedBy(User $user){
      return $user->id===$this->user_id; //
      //Aquí aseguramos que el id del usuario identificado recibido por
      //parámetro es el mismo que tenemos guardado en la tabla Posts user_id
   }

   public function user(){
       return $this->belongsTo(User::class);
   }

   public function likes(){
       return $this->hasMany(Like::class);
   }
}
