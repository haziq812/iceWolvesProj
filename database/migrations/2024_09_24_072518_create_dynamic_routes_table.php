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
        Schema::create('dynamic_routes', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('url2')->nullable();
            $table->string('url3')->nullable();
            $table->string('method');
            $table->string('controller');
            $table->string('action');
            $table->string('name')->unique();
            $table->json('middleware'); // Store middleware as a JSON array
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_routes');
    }
};
