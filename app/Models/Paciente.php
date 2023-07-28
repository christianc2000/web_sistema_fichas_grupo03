<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['id','age', 'occupation', 'children'];
    protected $table = 'patients';

    public function user()
    {
        return $this->belongsTo(User::class,'id','id');
    }
}
