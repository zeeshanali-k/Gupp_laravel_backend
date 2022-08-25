<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // current logged in user
            $table->unsignedBigInteger("user_id");
            // chat user id represent the other user
            $table->unsignedBigInteger("chat_user_id");

            $table->foreign("user_id")
                ->references("id")
                ->on("users")->onDelete("cascade");

            $table->foreign("chat_user_id")
                ->references("id")
                ->on("users")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
