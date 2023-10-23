<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = User::create([
            'ci' => '9821736',
            'name' => 'christian',
            'lastname' => 'mamani',
            'birth_date' => '2000-01-04',
            'gender' => 'M',
            'photo' => 'https://cdn.iconscout.com/icon/free/png-256/avatar-372-456324.png',
            'number_phone' => '63409229',
            'marital_status' => 'soltero',
            'current_residence' => 'plan 3000',
            'type' => 'A',
            'email' => 'christian@gmail.com',
            'password' => bcrypt('12345678'),
            'registration_date' => '2023-10-23'
        ]);
        Admin::create([
            'id' => $u->id
        ]);
    }
}
