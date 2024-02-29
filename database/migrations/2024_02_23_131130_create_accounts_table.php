<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\LanguageEnum;
use App\Enums\DefaultMApEnum;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('user_id');
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('region')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_prefix');
            $table->string('mobile');
            $table->enum('language', array_values(LanguageEnum::MAP));
            $table->enum('default_map',array_values(DefaultMApEnum::MAP));
            $table->string('time_zone');
            $table->string('landing_page');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
