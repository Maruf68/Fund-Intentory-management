<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundlists', function (Blueprint $table) {
         
            $table->id();        
            $table->string('name');
            $table->integer('amount');
            $table->string('method');
            $table->date('date');
            $table->string('d_name');
            $table->string('d_email');
            $table->string('d_phone');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');;
            // $table->foreignId('category_id')->constrained();  
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fundlists');
    }
};
