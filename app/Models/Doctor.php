<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=['id','cv','speciality'];
    protected $table = 'doctors';

    public function user(){
        return $this->belongsTo(User::class,'id','id');
    }
    public function doctorturnos(){
        return $this->hasMany(DoctorTurno::class,'doctor_id','id');
    }
}
