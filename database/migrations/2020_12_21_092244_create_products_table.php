<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {

            $table->bigIncrements('id');
            // $table->increments('id');
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            // $table->mediumText('short_description')->nullable();
            // $table->mediumText('long_description')->nullable();
            // $table->bigInteger('quantity')->nullable();
            // // $table->string('weight')->nullable();
            // $table->string('old_resller_price')->nullable();
            // $table->string('new_reseller_price')->nullable();
            // $table->string('old_wholeseller_price')->nullable();
            // $table->string('new_wholeseller_price')->nullable();
            $table->bigInteger('status')->nullable()->comment('1=active;2=block');
            $table->unsignedBigInteger('category_id');    
            $table->unsignedBigInteger('brand_id');          
            // $table->string('shipping_weight')->nullable();
            // $table->string('size')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('brand_id')->references('id')->on('brands');

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
        Schema::dropIfExists('products');
    }
}
