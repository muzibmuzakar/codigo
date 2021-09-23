<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;

class Slide extends Model
{
    use HasFactory;
    protected $fillable=[
        'slide',
        'materi_id',
    ];

    public function materi(){
        return $this->belongsTo(Materi::class);
    }
}
