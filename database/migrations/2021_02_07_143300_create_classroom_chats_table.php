<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class_room_id');
            $table->integer('user_id');
            $table->text('text');
            $table->char('file', 255);
            $table->timestamps();

            $table->foreign('class_room_id')
                    ->references('id')
                    ->on('classrooms')
                    ->onDelete('cascade');
                    
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom_chats');
    }
}
