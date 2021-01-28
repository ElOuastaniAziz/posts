<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //la otra forma de hacer referencia  al id de la tabla del usuario
           // $table->integer('user_id')->unsigned()->index();
            //la otra forma de hacer referencia  al id de la tabla del usuario
            $table->foreignId('user_id')->constraint()->ondelete('cascade');
            //ondelete cascade , si usuario es borrado se borrarán sus posts
            $table->text('body');
            $table->timestamps(); //Nos crea el created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
