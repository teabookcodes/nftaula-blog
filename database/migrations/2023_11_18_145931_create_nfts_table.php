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
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('collection_name');
            $table->string('image');
            $table->string('category');
            $table->string('marketplace');
            $table->string('blockchain');
            $table->decimal('price', $precision = 10, $scale = 4);
            $table->string('currency');
            $table->text('description')->nullable();
            $table->string('marketplace_link');
            $table->boolean('created_using_ai')->default(false);
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfts');
    }
};
