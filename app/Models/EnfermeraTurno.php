<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermeraTurno extends Model
{
    use HasFactory;
    protected $fillable = ['start_date', 'end_date'];
    protected $table = 'nurse_turn';

    public function turno()
    {
        return $this->belongsTo(Turno::class, 'turn_id', 'id');
    }
    public function enfermera()
    {
        return $this->belongsTo(Enfermera::class, 'nurse_id', 'id');
    }
}
