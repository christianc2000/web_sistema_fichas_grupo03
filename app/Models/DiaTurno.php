<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaTurno extends Model
{
    use HasFactory;
    
    protected $fillable=[];
    protected $table = 'day_turn';

    public function turno(){
        return $this->belongsTo(Turno::class,'turn_id','id');
    }
    public function dia(){
        return $this->belongsTo(Dia::class,'day_id','id');
    }
}
