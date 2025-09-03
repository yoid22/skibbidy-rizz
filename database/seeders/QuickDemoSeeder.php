<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickDemoSeeder extends Seeder {
    public function run(): void {
        // 5 topics
        for ($t=1; $t<=5; $t++) {
            $topicId = DB::table('topics')->insertGetId([
                'title' => "Topic $t",
                'description' => "Demo topic $t",
                'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
            
            for ($q=1; $q<=15; $q++) {
                $questionId = DB::table('questions')->insertGetId([
                    'topic_id' => $topicId,
                    'body' => "Question $q of Topic $t?",
                    'type' => 'single_choice',
                    'is_active' => true,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
                $correct = rand(1,4);
                for ($c=1; $c<=4; $c++) {
                    DB::table('choices')->insert([
                        'question_id' => $questionId,
                        'text' => "Choice $c",
                        'is_correct' => $c === $correct,
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
