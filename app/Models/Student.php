<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];

    public function nis()
    {
        return $this->hasOne(Nis::class);
    }

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class);
    }

}
