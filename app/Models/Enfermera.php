<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermera extends Model
{
    use HasFactory;
    protected $fillable = ['id','cv','function'];
    protected $table = 'nurses';

    public function user()
    {
        return $this->belongsTo(User::class,'id','id');
    }
}
