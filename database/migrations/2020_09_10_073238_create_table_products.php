<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
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
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->string('per_price')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_pack')->nullable();
            $table->string('roasting')->nullable();
            $table->string('processing_method')->nullable();
            $table->string('altitude')->nullable();
            $table->string('water_content')->nullable();
            $table->string('variety')->nullable();
            $table->string('aroma')->nullable();
            $table->string('body')->nullable();
            $table->string('flavour')->nullable();
            $table->string('about')->nullable();
            $table->string('link_buy')->nullable();
            $table->string('category')->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes('deleted_at');	
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
