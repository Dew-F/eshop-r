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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('ID');
            $table->foreignId('UserID')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('PayStatus');
            $table->boolean('OrderStatus');
            $table->string('DeliveryMethod');
            $table->string('PayMethod');
            $table->string('FullName');
            $table->string('Telephone');
            $table->string('Email');
            $table->string('Address')->nullable();
            $table->integer('Total');
            $table->timestamp('CreatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
