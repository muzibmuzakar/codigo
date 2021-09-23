<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Soal extends Model
{
    use HasFactory;
    protected $fillable =[
        'quiz_id', 'question', 'choice1', 'choice2', 'choice3', 'choice4', 'answer', 'materi_id'
    ];
    
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
