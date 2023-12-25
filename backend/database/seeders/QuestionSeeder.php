<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\TestCategory;
use App\Models\TestLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testCategoriesIds = TestCategory::pluck('id');
        $testLevelIds = TestLevel::pluck('id');
        for( $i = 1; $i <= 300; $i++){
            $question = new Question();
            $question->test_category_id = $testCategoriesIds->random();
            $question->test_level_id = $testLevelIds->random();
            $question->content = "The content of the question $i";
            $question->type = rand(1,2);
            $question->created_at = now();
            $question->save();
        }
    }
}
