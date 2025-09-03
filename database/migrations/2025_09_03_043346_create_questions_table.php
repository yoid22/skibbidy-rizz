<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained()->cascadeOnDelete();
            $table->text('body');
            $table->enum('type', ['single_choice','multi_choice','boolean'])->default('single_choice');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->index(['topic_id','is_active']);
        });
    }
    public function down(): void { Schema::dropIfExists('questions'); }
};
