<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->string('text');
            $table->boolean('is_correct')->default(false)->index();
            $table->timestamps();
            $table->index(['question_id','is_correct']);
        });
    }
    public function down(): void { Schema::dropIfExists('choices'); }
};
