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
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->boolean('is_freelancer')->default(0)->comment('0: kullanıcı hesabı, 1: freelancer');
            $table->boolean('is_admin')->default(0)->comment('0: kullanıcı, 1: admin');
            $table->boolean('status')->default(0)->comment('0: onaysız kullanıcı, 1: onaylı kullanıcı');
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('description')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
