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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_category_id')->nullable()->constrained('post_categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('title');
            $table->string('slug');
            $table->longText('content');
            $table->string('thumbnail')->nullable();
            $table->integer('read_by')->default(0);
            $table->enum('status', ['draft', 'publish', 'unpublish'])->nullable()->default('publish');
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
