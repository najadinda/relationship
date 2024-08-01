<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hobby extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_hobi',
    ];

    public function murid(){
        return $this->belongsToMany(Murid::class);
    }
}
