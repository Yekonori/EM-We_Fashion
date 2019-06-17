<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id'); // Primary Key
            $table->unsignedInteger('product_id'); // Foreign Key of Products Table
            $table->string('link', 100); // Varvchar(100)
            $table->string('title', 100)->nullable(); // Varvchar(100) + Nullable
            $table->timestamps(); // TimeStamps
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE'); // Cascade delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
