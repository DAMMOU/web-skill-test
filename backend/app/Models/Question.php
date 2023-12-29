<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = ['test_category_id', 'test_level_id', 'content', 'type'];

    public function test_category()
    {
        return $this->belongsTo(TestCategory::class, 'test_category_id');
    }

    public function test_level()
    {
        return $this->belongsTo(TestLevel::class, 'test_level_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
