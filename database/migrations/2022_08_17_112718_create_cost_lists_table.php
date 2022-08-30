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
        Schema::create('cost_lists', function (Blueprint $table) {
          
            $table->id();
            $table->string('name');
            $table->integer('amount');
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            
            // $table->foreignId('project_id')->constrained();
            $table->string('upload');
            $table->integer('cost_category_id')->unsigned()->nullable();
            $table->foreign('cost_category_id')->references('id')->on('cost_categories');

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
        Schema::dropIfExists('cost_lists');
    }
};



