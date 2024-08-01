<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory, SoftDeletes;

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
