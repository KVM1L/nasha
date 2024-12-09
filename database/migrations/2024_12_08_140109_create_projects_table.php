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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('tags')->nullable();
            $table->string('cover')->nullable();
            $table->string('video')->nullable();
            $table->json('text')->nullable();
            $table->json('description')->nullable();
            $table->string('photo_1')->nullable();  
            $table->string('photo_2')->nullable();
            $table->string('footer_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
