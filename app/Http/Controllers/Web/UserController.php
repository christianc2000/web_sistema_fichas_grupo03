<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function menu()
    {
        return view('dashboard');
    }
    public function perfil()
    {
        return view('user.perfil');
    }


    //******************************************** */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function show($id)
    {
    }
    public function destroy($id)
    {
    }
}
