<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questionIds = Question::pluck('id');
        foreach($questionIds as $questionId){
            for($i = 1; $i <= 3; $i++){
                $answer =  new Answer();
                $answer->question_id = $questionId;
                $answer->content = "The Anwser $i of the question $questionId";
                $answer->is_correct = false;
                if($i == 3){
                    $answer->is_correct = true;
                }
                $answer->save();
            }
        }

    }
}
