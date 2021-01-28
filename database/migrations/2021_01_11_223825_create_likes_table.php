<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            //un like hecho por un usuario, cascade ,
            //si un usuario se elimina, se borrarán sus likes
            $table->foreignId('user_id')->constraint()->ondelete('cascade');
            //un like hecho a un post,cascade ,
            //si un post se elimina, se borrarán los likes tambien
            $table->foreignId('post_id')->constraint()->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
