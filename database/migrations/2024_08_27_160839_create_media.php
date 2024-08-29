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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('model_type'); 
            $table->unsignedBigInteger('model_id'); 
            $table->string('collection_name'); 
            $table->string('name'); 
            $table->string('file_name'); 
            $table->string('mime_type'); 
            $table->string('disk'); 
            $table->unsignedBigInteger('size'); 
            $table->json('manipulations')->nullable(); 
            $table->json('custom_properties')->nullable(); 
            $table->json('responsive_images')->nullable(); 
            $table->integer('order_column')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
