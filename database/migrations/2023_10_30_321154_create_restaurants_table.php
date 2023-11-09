<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('score')->default(0);
            $table->string('phone');
            $table->bigInteger('account_number');
            $table->bigInteger('sending_price');
            $table->foreignId('restaurant_category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->tinyInteger('status')->default(1);
            $table->time('open_time');
            $table->time('close_time');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
