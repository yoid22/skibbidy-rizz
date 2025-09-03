<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('topic_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('total_questions')->default(15);
            $table->unsignedSmallInteger('score')->default(0)->index();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable()->index();
            $table->unsignedBigInteger('seed')->nullable(); 
            $table->timestamps();
            $table->index(['topic_id','score']);
        });
    }
    public function down(): void { Schema::dropIfExists('quizzes'); }
};
