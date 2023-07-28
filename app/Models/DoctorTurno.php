<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTurno extends Model
{
    use HasFactory;
    protected $fillable=['start_date','end_date'];
    protected $table = 'doctor_turn';

    public function turno(){
        return $this->belongsTo(Turno::class,'turn_id','id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
}
