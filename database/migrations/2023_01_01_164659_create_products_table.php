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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('brand_id')->nullable();
            $table->string('category_id');
            $table->string('subcategory_id');
            $table->string('unittype_id');
            $table->text('description')->nullable();
            $table->double('amount')->nullable();
            $table->double('purchase_price')->nullable();
            $table->boolean('isshow')->nullable();
         
    

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
};
