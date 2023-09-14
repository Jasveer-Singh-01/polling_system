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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 255);
            $table->string('lastname', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('phone', 255)->unique();
            $table->string('otp', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 500);
            $table->enum('is_verified_user', ['No', 'Yes']);
            $table->rememberToken();
            $table->enum('status', ['Active', 'Inactive', 'Deleted']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
