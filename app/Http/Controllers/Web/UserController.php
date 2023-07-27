<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function menu(){
        return view('dashboard');
    }
    public function perfil(){
        return view('user.perfil');
    }
}