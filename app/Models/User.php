<?php

namespace App\Models;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ci', 
        'name', 
        'lastname', 
        'birth_date', 
        'gender', 
        'photo',
        'number_phone', 
        'marital_status', 
        'current_residence', 
        'type', 
        'email', 
        'password', 
        'registration_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class,'id','id');
    }
    public function enfermera()
    {
        return $this->hasOne(Enfermera::class,'id','id');
    }
    public function paciente()
    {
        return $this->hasOne(Paciente::class,'id','id');
    }
    public function getAge()
    {
        $birthDate = DateTime::createFromFormat('Y-m-d', $this->birth_date);
        // Obtener la fecha actual
        $today = new DateTime();
        // Calcular la diferencia entre las dos fechas (fecha de nacimiento y fecha actual)
        $diff = $today->diff($birthDate);
        // Obtener la edad del usuario en años
        $age = $diff->y;
        return $age;
    }
}
