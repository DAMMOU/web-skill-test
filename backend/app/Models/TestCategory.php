<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\TestCase;

class TestCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function questions(){
        return $this->HasMany(Question::class, 'question_id');
    }

   
}
