<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_images', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->string('path')->nullable()->default(null);
            $table->string('alt')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);

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
        Schema::dropIfExists('category_images');
    }
}
