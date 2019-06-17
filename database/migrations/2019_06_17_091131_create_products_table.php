<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id'); // Primary Key
            $table->string('name', 100); // Varchar(100)
            $table->text('description'); // Text
            $table->decimal('price', 7, 2); // Decimal(7,2)
            $table->text('size')->nullable(); // Text
            $table->text('picture')->nullable(); // Text
            $table->enum('visibility', ['published', 'unpublished']); // Enum('published', 'unpublished')
            $table->enum('status', ['standard', 'sale']); // Enum('standard', 'sale')
            $table->string('reference', 16)->nullable(); // Varchar(16)
            $table->unsignedInteger('categorie_id')->nullable(); // Foreign Key of Categories Table
            $table->timestamps(); // TimeStamps

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('SET NULL'); // Set NULL on delete
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
