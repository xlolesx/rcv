<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Activitylog\Models\Activity;
use Spatie\QueryBuilder\QueryBuilder;
use App\User;
use App\Admin;
use Auth;
use App\Vehicle;
use App\Policy;
use App\Office;
use App\ActivityLog;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offices = Office::all();

        return view('admin', compact('offices'));
    }

    public function index_users()
    {
        $users = User::all();
        return view('admin-modules.Users.admin-users-index', compact('users'));
    }

    public function show_user($id)
    {
        $user = User::findOrFail($id);

        $vehicle_types =  Policy::select('vehicle_type')->where('user_id', $id)->get();
        $carros = [];
        $motos = [];

        foreach ($vehicle_types as $row) {
            if ($row->vehicle_type == FALSE) {
                array_push($carros, $row);
            }
            else {
                array_push($motos, $row);
            }
        }
        $count_motorcycles = count($motos);
        $count_cars = count($carros);

        return view('admin-modules.Users.admin-user-show', compact('user', 'count_motorcycles', 'count_cars'));
    }

    public function edit($id)
    {

        $user    = User::findOrFail($id);
        
        $cedula = $user->ci;
        $id_type = substr($cedula, 0, 2);

        $identification = preg_split('/[A-Z].*?-/', $cedula);
        array_push($identification, $id_type);

        $phone = $user->phone_number;
        $phone_number = preg_split('/-/', $phone);

        $offices = Office::all();
        return  view('admin-modules.Users.admin-user-edit', compact('user', 'id', 'offices', 'identification', 'phone_number'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_ ]+$/'],
            'username' => ['required', 'string', 'min:2', 'max:255', 'regex:/^\S*$/u'],
            'lastname' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_ ]+$/'],
            'ci' => ['required', 'max:10', 'min:7', 'regex:/[^A-Za-z-\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'office_id' =>['required'],
            'profit_percentage' => ['required', 'numeric'],
            'id_type' =>['required']
        ], [
            'name.required' => 'Este campo no puede estar vacio',
            'name.min'      => 'El nombre debe tener al menos 2 letras',
            'name.max'      => 'El nombre no puede ser mas largo que 255 caracteres',
            'name.string'   => 'El nombre no debe contener caracteres especiales',
            'name.regex'    => 'El nombre no puede contener numeros',
            'lastname.required' => 'Este campo no puede estar vacio',
            'lastname.string'   => 'El apellido no puede contener caracteres especiales',
            'lastname.regex'    => 'El apellido no puede contener numeros',
            'lastname.max'      => 'El apellido no puede mas largo que 255 caracteres',
            'lastname.min'      => 'El apellido debe tener al menos 2 letras',
            'ci.required'       => 'Este campo no puede estar vacio',
            'ci.regex'          => 'Este campo no puede contener letras o espacios',
            'ci.min'            => 'La cedula debe contener al menos 2 numeros',
            'ci.max'            => 'La cedula no debe tener mas de 10 numeros',
            'ci.unique'         => 'Esta cedula ya esta en uso',
            'email.required'=> 'Este campo no puede estar vacio',
            'email.email'   => 'Correo electronico invalido',
            'email.max'     => 'El correo electronico no puede ser mas largo que 255 caracteres',
            'office_id.required'=> 'Este campo no puede estar vacio', 
            'username.required' => 'Este campo no puede estar vacio',    
            'username.min'      => 'El nombre de usuario no debe tener al menos 2 letras',   
            'username.max'      => 'El nombre de usuario no puede ser mas largo que 255 caracteres',   
            'username.regex'    => 'El nombre de usuario no puede contener espacios',
            'profit_percentage.required' => 'Este campo no puede estar vacio',
            'profit_percentage.numeric'  => 'Este campo solo puede contener numeros'
        ]);
        $user_ci = $request->input('id_type').$request->input('ci');

        $user                    = User::find($id);
        $user->name              = $request->input('name');
        $user->lastname          = $request->input('lastname');
        $user->username          = $request->input('username');
        $user->ci                = $user_ci;   
        $user->email             = $request->input('email');
        $user->office_id         = $request->input('office_id');
        $user->profit_percentage = $request->input('profit_percentage');
        $user->save();

        return redirect('/admin/index-users');

    }

    public function edit_password($id)
    {
        return view('admin-modules.Users.admin-user-password', compact('id'));
    }

    public function update_password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/index-users')->with('success', 'Contraseña actualizada correctamente');
    }

    public function admin_edit_password($id){
        return view('admin-modules.Admins.admin-password', compact('id'));
    }

    public function admin_update_password(Request $request, $id){
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Admin::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin')->with('success', 'Contraseña actualizada correctamente');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/admin/index-users');
    }

    // Registros de actividad admin

    public function admin_activity_log(){
        $id = Auth::user()->id;
        $activities = ActivityLog::where('causer_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin-modules.Activity.admin-activitylog-index', compact('activities'));
    }

    public function admin_activity_log_all(){
        $activities1 = ActivityLog::where('causer_id', 'like', '%9995%')->orderBy('created_at', 'desc')->get();
        $activities2 = ActivityLog::where('causer_id', 'not like', '%9995%')->orderBy('created_at', 'desc')->get();

        return view('admin-modules.Activity.admin-activitylog-index-all', compact('activities1', 'activities2'));
    }

    public function admin_activity_log_user($id){
        $activities = ActivityLog::select()->where('causer_id', $id)->orderBy('created_at', 'desc')->get();
        return view('admin-modules.Activity.admin-activitylog-index-user', compact('activities'));
    }

    public function admin_activity_log_admin($id){
        $activities = ActivityLog::select()->where('causer_id', $id)->orderBy('created_at', 'desc')->get();
        return view('admin-modules.Activity.admin-activitylog-index-admin', compact('activities'));
    }


    // CRUD ADMINS

    public function index_users_admins(){
        $users = Admin::all();
        return view('admin-modules.Admins.admin-adminusers-index', compact('users'));
    }

    public function show_admin($id){
        $user = Admin::findOrFail($id);
        return view('admin-modules.Admins.admin-adminuser-show', compact('user')); 
    }

    public function edit_admin($id){
        $user = Admin::findOrFail($id);
        
        $cedula = $user->ci;
        $id_type = substr($cedula, 0, 2);

        $identification = preg_split('/[A-Z].*?-/', $cedula);
        array_push($identification, $id_type);

        $phone = $user->phone_number;
        $phone_number = preg_split('/-/', $phone);

        return  view('admin-modules.Admins.admin-adminuser-edit', compact('user', 'id', 'identification', 'phone_number'));
    }

    public function update_admin(Request $request, $id){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'ci' => ['required', 'max:10', 'min:7', 'regex:/[^A-Za-z-\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'id_type' =>['required']
        ]);
    
        $user_ci = $request->input('id_type').$request->input('ci');

        $user                    = Admin::find($id);
        $user->name              = $request->input('name');
        $user->ci                = $user_ci;   
        $user->email             = $request->input('email');
        $user->save();

        return redirect('/admin/index-admins');
    }

    public function destroy_admin($id){
        $users = Admin::findOrFail($id);
        $users->delete();
        return redirect('/admin/index-admins');
    }
}
