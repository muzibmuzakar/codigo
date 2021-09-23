<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;

class Pelajaran extends Model
{
    use HasFactory;

    protected $table = "pelajarans";
    protected $fillable = [
        'name', 'detail', 'image'
    ];

    public function slide(){
        return $this->hasMany(Materi::class);
    }
}
