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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->string('users_id');
            $table->string('p_name');
            $table->string('p_price');
            $table->string('p_color');
            $table->string('p_size');
            $table->string('p_discount');
            // $table->string('password');
            $table->text('p_image1');
            // $table->string('cpassword');
           
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
