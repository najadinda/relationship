<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hobi',
    ];

    public function murid(){
        return $this->belongsToMany(Murid::class);
    }
}
