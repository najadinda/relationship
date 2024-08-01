<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Murid extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_murid',
        'hobby_id'
    ];

    public function hobbies(){
        return $this->belongsToMany(Hobby::class, 'hobby_murid', 'murid_id', 'hobby_id');
    }
}
