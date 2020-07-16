<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminusers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamp('email')->nullable();
            $table->string('password')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('adminusers');
    }
}
