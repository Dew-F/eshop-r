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
            $table->id('ID');
            $table->string('Name', 100);
            $table->foreignId('SubcategoryID')->constrained('subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->text('FullDescription');
            $table->string('ShortDescription', 300);
            $table->integer('Price');
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
