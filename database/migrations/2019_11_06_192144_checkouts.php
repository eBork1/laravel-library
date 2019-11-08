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
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('checked_by');
            
            $table->foreign('book_id')
                ->references('id')
                ->on('books');
            
            $table->foreign('checked_by')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
