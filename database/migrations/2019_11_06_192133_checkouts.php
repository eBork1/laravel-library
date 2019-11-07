<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checkouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('checkouts', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('book_id');
            $table->integer('user_id');
            $table->timestamp('checked_at')->nullable();
            $table->boolean('returned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
