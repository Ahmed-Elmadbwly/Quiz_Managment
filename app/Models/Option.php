<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['questionId','optionText','isCorrect'];
    public function answer()
    {
        return UserAnswer::where('optionId',$this->id)->where('userId',auth()->id())->first();
    }
}
