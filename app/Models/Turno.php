<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    
    protected $fillable=['name','active','start_time','end_time'];
    protected $table = 'turns';

    public function sala(){
        return $this->belongsTo(Sala::class, 'room_id', 'id');
    }

    public function diaturnos(){
        return $this->hasMany(DiaTurno::class,'turn_id','id');
     }

}
