<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('order_index'); 
            $table->timestamps();

            $table->unique(['quiz_id','question_id']);
            $table->index(['quiz_id','order_index']);
        });
    }
    public function down(): void { Schema::dropIfExists('quiz_questions'); }
};
