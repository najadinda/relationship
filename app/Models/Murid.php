<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_murid',
        'hobby_id'
    ];

    public function hobbies(){
        return $this->belongsToMany(Hobby::class, 'hobby_murid', 'murid_id', 'hobby_id');
    }
}
