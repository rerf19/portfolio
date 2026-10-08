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
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('short_description', 500);
            $table->text('full_description');
            $table->json('technologies')->nullable();
            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->json('team')->nullable();
            $table->string('status')->default('live');
            $table->string('year', 4);
            $table->boolean('featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0)->index();
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
