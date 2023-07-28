<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'rooms';

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
