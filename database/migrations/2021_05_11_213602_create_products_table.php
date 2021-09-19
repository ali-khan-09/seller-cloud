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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('product_name');
            $table->text('product_short_desc');
            $table->longText('product_long_desc');
            $table->string('product_weight');
            $table->string('product_shipping_weight');
            $table->string('product_weightOz');
            $table->string('product_package_weightLbs');
            $table->integer('product_company_id');
            $table->integer('product_brand_id');
            //$table->string('product_type');
            $table->string('product_condition');
            $table->double('product_upc');
            $table->double('product_cost_price');
            $table->double('product_map_price');
            $table->double('product_msrp_price');
            $table->string('product_image');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
