<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' , 'description' ,'time' ,'createdBy'
    ];
    public function questions()
    {
        return $this->hasMany(Question::class, 'quizId');
    }
    public function testHasSubmit()
    {
        return QuizAttempt::where('userId',auth()->id())->where('quizId',$this->id)->first();
    }
}
