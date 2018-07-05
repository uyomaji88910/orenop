<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status'); //edit by chee 7/5 ↓
            $table->integer('user_id')->unsigned()->index();
            $table->date('created_at'); //Date column
            $table->time('updated_at'); //Time column
            //$table->timestamps();
            $table->unique(['user_id','created_at']); //unique 設定
            
             // Foreign key settings
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attends');
    }
}
