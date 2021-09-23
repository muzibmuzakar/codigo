<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;
use App\Models\Soal;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable =[
        'pelajaran_id', 'materi_id', 'judul'
    ];

    public function quiz(){
        return $this->belongsTo(Materi::class);
    }
    
    public function soal(){
        return $this->hasMany(Soal::class);
    }
}
