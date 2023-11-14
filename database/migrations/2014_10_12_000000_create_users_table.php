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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('name',15);
            $table->string('phone')->nullable();
=======
            $table->string('name',100);
            $table->string('phone',10)->nullable();
>>>>>>> 9ab9fed4b614f161663ed20d4fb641844006f2d3
            $table->string('address')->nullable();
            $table->tinyInteger('role')->default(0);
            $table->string('email',100);
            $table->string('image',255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
