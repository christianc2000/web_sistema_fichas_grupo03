<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Enfermera;
use App\Models\Paciente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $users = DB::select('SELECT id,ci,name,lastname,birth_date,number_phone,current_residence,photo,registration_date,email,type,marital_status,gender,EXTRACT(YEAR FROM AGE(CURRENT_DATE, birth_date)) AS age FROM users');
        //$users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'ci' => 'required|string|unique:users,ci',
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'birth_date' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|string|max:1',
            'number_phone' => 'required|string|max:15',
            'marital_status' => 'required|string|max:15',
            'current_residence' => 'required|string|max:40',
            'type' => 'required|string|max:1',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'registration_date' => 'required|string',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'cve' => 'nullable|mimes:pdf|max:2048',
            'speciality' => 'nullable|string|max:255',
            'function' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'children' => 'nullable|string|max:255'
        ]);

        switch ($request->type) {
            case 'A':
                if ($request->hasFile('photo')) {
                    $date = Carbon::now(new \DateTimeZone('America/La_Paz'))->format('Y-m-d');

                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    $user = User::create([
                        'ci' => $request->ci,
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'birth_date' => $request->birth_date,
                        'gender' => $request->gender,
                        'photo' => $url,
                        'number_phone' => $request->number_phone,
                        'marital_status' => $request->marital_status,
                        'current_residence' => $request->current_residence,
                        'type' => $request->type,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'registration_date' => $request->registration_date
                    ]);
                    $admin = Admin::create([
                        'id' => $user->id
                    ]);
                }
                break;
            case 'D':
                if ($request->hasFile('photo') && $request->hasFile('cv')) {
                    //   $date = Carbon::now(new \DateTimeZone('America/La_Paz'))->format('Y-m-d');

                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    $user = User::create([
                        'ci' => $request->ci,
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'birth_date' => $request->birth_date,
                        'gender' => $request->gender,
                        'photo' => $url,
                        'number_phone' => $request->number_phone,
                        'marital_status' => $request->marital_status,
                        'current_residence' => $request->current_residence,
                        'type' => $request->type,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'registration_date' => $request->registration_date
                    ]);

                    $doctor = Doctor::create([
                        'id' => $user->id,
                        'cv' => $request->cv,
                        'speciality' => $request->speciality
                    ]);
                }

                break;
            case 'E':

                if ($request->hasFile('photo') && $request->hasFile('cve')) {
                    //   $date = Carbon::now(new \DateTimeZone('America/La_Paz'))->format('Y-m-d');
                    // return "entra en ENFERMERA ES FILE";
                    $folder = "consultorio";
                    $folder2 = "cv";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    $urlCV = Storage::disk('s3')->put($folder2, $request->photo, 'public');
                    $user = User::create([
                        'ci' => $request->ci,
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'birth_date' => $request->birth_date,
                        'gender' => $request->gender,
                        'photo' => $url,
                        'number_phone' => $request->number_phone,
                        'marital_status' => $request->marital_status,
                        'current_residence' => $request->current_residence,
                        'type' => $request->type,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'registration_date' => $request->registration_date
                    ]);

                    $enfermera = Enfermera::create([
                        'id' => $user->id,
                        'cv' => $urlCV,
                        'function' => $request->function
                    ]);
                } else {
                    return "NO ES UN PDF";
                }
                break;
            case 'P':
                if ($request->hasFile('photo')) {
                    //  $date = Carbon::now(new \DateTimeZone('America/La_Paz'))->format('Y-m-d');

                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    $user = User::create([
                        'ci' => $request->ci,
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'birth_date' => $request->birth_date,
                        'gender' => $request->gender,
                        'photo' => $url,
                        'number_phone' => $request->number_phone,
                        'marital_status' => $request->marital_status,
                        'current_residence' => $request->current_residence,
                        'type' => $request->type,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'registration_date' => $request->registration_date
                    ]);

                    $paciente = Paciente::create([
                        'id' => $user->id,
                        'age' => $user->getAge(),
                        'occupation' => $request->occupation,
                        'children' => $request->children
                    ]);
                }
                break;
            default:

                break;
        }
        Session::flash('success', 'El usuario ha sido registrado exitosamente.');
        return redirect()->route('user.index');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'ci' => 'nullable|string',
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'birth_date' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'nullable|string|max:1',
            'number_phone' => 'required|string|max:15',
            'marital_status' => 'required|string|max:15',
            'current_residence' => 'required|string|max:40',
            'type' => 'nullable|string|max:1',
            'email' => 'required|email',
            'password' => 'nullable|string|confirmed',
            'registration_date' => 'nullable|string',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'cve' => 'nullable|mimes:pdf|max:2048',
            'speciality' => 'nullable|string|max:255',
            'function' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'children' => 'nullable|string|max:255'
        ]);
        $user = User::find($id);
        switch ($user->type) {
            case 'A':
                $url = $user->photo;
                if ($request->hasFile('photo')) {
                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $user->name = (isset($request->name)) ? $request->name : $user->name;
                $user->lastname = (isset($request->lastname)) ? $request->lastname : $user->lastname;
                $user->birth_date = (isset($request->birth_date)) ? $request->birth_date : $user->birth_date;
                $user->photo = $url;
                $user->number_phone = (isset($request->number_phone)) ? $request->number_phone : $user->number_phone;
                $user->marital_status = (isset($request->marital_status)) ? $request->marital_status : $user->marital_status;
                $user->current_residence = (isset($request->current_residence)) ? $request->current_residence : $user->current_residence;

                $user->email = (isset($request->email)) ? $request->email : $user->email;
                $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
                $user->save();
                break;

            case 'D':
                $url = $user->photo;
                if ($request->hasFile('photo')) {
                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $user->name = (isset($request->name)) ? $request->name : $user->name;
                $user->lastname = (isset($request->lastname)) ? $request->lastname : $user->lastname;
                $user->birth_date = (isset($request->birth_date)) ? $request->birth_date : $user->birth_date;
                $user->photo = $url;
                $user->number_phone = (isset($request->number_phone)) ? $request->number_phone : $user->number_phone;
                $user->marital_status = (isset($request->marital_status)) ? $request->marital_status : $user->marital_status;
                $user->current_residence = (isset($request->current_residence)) ? $request->current_residence : $user->current_residence;

                $user->email = (isset($request->email)) ? $request->email : $user->email;
                $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
                $user->save();
                $doctor = Doctor::find($user->id);
                $urld = $doctor->cv;
                if ($request->hasFile('cv')) {
                    $folder = "cv";
                    $urld = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $doctor->cv = $urld;
                $doctor->speciality = (isset($request->speciality)) ? $request->speciality : $doctor->speciality;
                $doctor->save();

                break;

            case 'E':

                $url = $user->photo;
                if ($request->hasFile('photo')) {
                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $user->name = (isset($request->name)) ? $request->name : $user->name;
                $user->lastname = (isset($request->lastname)) ? $request->lastname : $user->lastname;
                $user->birth_date = (isset($request->birth_date)) ? $request->birth_date : $user->birth_date;
                $user->photo = $url;
                $user->number_phone = (isset($request->number_phone)) ? $request->number_phone : $user->number_phone;
                $user->marital_status = (isset($request->marital_status)) ? $request->marital_status : $user->marital_status;
                $user->current_residence = (isset($request->current_residence)) ? $request->current_residence : $user->current_residence;

                $user->email = (isset($request->email)) ? $request->email : $user->email;
                $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
                $user->save();
                $enfermera = Enfermera::find($user->id);
                $urld = $enfermera->cv;
                if ($request->hasFile('cve')) {
                    $folder = "cv";
                    $urld = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $enfermera->cv = $urld;
                $enfermera->function = (isset($request->function)) ? $request->function : $enfermera->function;
                $enfermera->save();

                break;
            case 'P':
                $url = $user->photo;
                if ($request->hasFile('photo')) {
                    $folder = "consultorio";
                    $url = Storage::disk('s3')->put($folder, $request->photo, 'public');
                    //  Storage::disk('s3')->delete($user->photo);
                }
                $user->name = (isset($request->name)) ? $request->name : $user->name;
                $user->lastname = (isset($request->lastname)) ? $request->lastname : $user->lastname;
                $user->birth_date = (isset($request->birth_date)) ? $request->birth_date : $user->birth_date;
                $user->photo = $url;
                $user->number_phone = (isset($request->number_phone)) ? $request->number_phone : $user->number_phone;
                $user->marital_status = (isset($request->marital_status)) ? $request->marital_status : $user->marital_status;
                $user->current_residence = (isset($request->current_residence)) ? $request->current_residence : $user->current_residence;

                $user->email = (isset($request->email)) ? $request->email : $user->email;
                $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
                $user->save();
                $paciente = Paciente::find($user->id);
               
                $paciente->occupation = (isset($request->occupation)) ? $request->occupation : $paciente->occupation;
                $paciente->children = (isset($request->children)) ? $request->children : $paciente->children;
                $paciente->save();
                break;
            default:

                break;
        }
        Session::flash('success', 'El usuario ha sido registrado exitosamente.');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('delete', 'El usuario ' . $user->name . ' ha sido eliminado.');
        return redirect()->route('user.index');
    }
}
