<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active', 'start_time', 'end_time','room_id'];
    protected $table = 'turns';

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'room_id', 'id');
    }

    public function diaturnos()
    {
        return $this->hasMany(DiaTurno::class, 'turn_id', 'id');
    }
    public function doctorturnos()
    {
        return $this->hasMany(DoctorTurno::class, 'doctor_id', 'id');
    }
    public function setTurnoActivo()
    {
    }
    public function turnodoctorActivo()
    {

        foreach ($this->doctorturnos as $td) {
            if ($td->end_date === null) {
                return $td->doctor->user->name;
            }
        }
        return null;
    }
}
