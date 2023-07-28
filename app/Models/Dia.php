<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'days';

    public function diaturnos(){
       return $this->hasMany(DiaTurno::class);
    }
}
