<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    // ###### Run the migrations. ######
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('completed');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    // ###### Reverse the migrations. ######
    public function down()
    {
        Schema::dropIfExists('todos');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
