<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_id');
            $table->integer('department_id');
            $table->integer('user_id');
            $table->text('name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('day_id');
            $table->dateTime('time_id');
            $table->timestamps();

            $table->foreign('university_id')
                    ->references('id')
                    ->on('universities')
                    ->onDelete('cascade');
            
            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
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
        Schema::dropIfExists('lessons');
    }
}
