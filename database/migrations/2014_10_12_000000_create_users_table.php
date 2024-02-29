<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserTypeEnum;
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
            $table->string('email')->unique();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->string('username')->unique();
            $table->timestamp('last_login')->nullable();
            $table->enum('user_type',array_values(UserTypeEnum::MAP));
            $table->integer('allowable_users')->nullable();
            $table->timestamp('locked_at')->nullable();
            $table->string('financial_number')->nullable();
            $table->string('background_color')->nullable();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();
            $table->softDeletes()->nullable();
            $table->integer('jwt_ttl')->default(480);
            $table->string('imei')->unique()->nullable();
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
