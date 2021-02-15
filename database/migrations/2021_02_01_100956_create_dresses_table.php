<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dresses');
        Schema::create('dresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dress_name')->nullable();
            $table->integer('quantity')->default(0);
            $table->double('prices',8,2)->default(0);
            $table->integer('status')->nullable();               
            $table->unsignedBigInteger('brand_id');  
            $table->unsignedBigInteger('user_id');      

            $table->foreign('user_id')->references('id')->on('users');        
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('dresses');
    }
}
