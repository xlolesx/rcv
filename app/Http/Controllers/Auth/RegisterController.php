<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm()
    {
        $offices = Office::all();

        return view('auth.register', compact('offices'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_ ]+$/'],
            'username'          => ['required', 'string', 'min:2', 'max:255', 'regex:/^\S*$/u', 'unique:users'],
            'lastname'          => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_ ]+$/'],
            'ci'                => ['required', 'max:10', 'min:7', 'unique:users', 'regex:/[^A-Za-z-\s]+$/'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'office_id'         => ['required'],
            'profit_percentage' => ['required', 'numeric'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'id_type'           => ['required'],
            'phone_number'      => ['min:5', 'max:8', 'regex:/[^A-Za-z-\s]+$/']
        ], [
            'name.required' => 'Este campo no puede estar vacio',
            'name.min'      => 'El nombre debe tener al menos 2 letras',
            'name.max'      => 'El nombre no puede ser mas largo que 255 caracteres',
            'name.string'   => 'El nombre no debe tener caracteres especiales',
            'name.regex'    => 'El nombre no puede tener numeros',
            'lastname.required' => 'Este campo no puede estar vacio',
            'lastname.string'   => 'El apellido no puede contener caracteres especiales',
            'lastname.regex'    => 'El apellido no puede contener numeros',
            'lastname.max'      => 'El apellido no puede mas largo que 255 caracteres',
            'lastname.min'      => 'El apellido debe tener al menos 2 letras',
            'ci.required'       => 'Este campo no puede estar vacio',
            'ci.regex'          => 'Este campo no puede contener letras o espacios',
            'ci.min'            => 'La cedula debe tener al menos 2 numeros',
            'ci.max'            => 'La cedula no debe tener mas de 10 numeros',
            'ci.unique'         => 'Esta cedula ya esta en uso',
            'email.required'=> 'Este campo no puede estar vacio',
            'email.email'   => 'Correo electronico invalido',
            'email.max'     => 'El correo electronico no puede ser mas largo que 255 caracteres',
            'email.unique'  => 'Este orreo electronico ya esta en uso',
            'office_id.required'=> 'Este campo no puede estar vacio', 
            'username.required' => 'Este campo no puede estar vacio',    
            'username.min'      => 'El nombre de usuario no debe tener al menos 2 letras',   
            'username.max'      => 'El nombre de usuario no puede ser mas largo que 255 caracteres',   
            'username.regex'    => 'El nombre de usuario no puede contener espacios',
            'username.unique'   => 'Este nombre de usuario ya esta en eso',
            'profit_percentage.required' => 'Este campo no puede estar vacio',
            'profit_percentage.numeric'  => 'Este campo solo puede contener numeros',
            // 'phone_number.required'      => 'Este campo no puede estar vacio',
            'phone_number.min'           => 'Este campo debe tener al menos 5 números',
            'phone_number.max'           => 'Este campo no puede tener mas de 7 números',
            'phone_number.regex'         => 'Este campo no puede tener letras o espacios',
            'password.required' => 'Este campo no puede estar vacio',
            'password.min'      => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed'=> 'La contraseña no coincide',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_ci = $data['id_type'].$data['ci'];
        $names = strtolower($data['name']);
        $lastname = strtolower($data['lastname']);
        
        return User::create([
            'name'              => ucwords($names),
            'lastname'          => ucwords($lastname),
            'username'          => $data['username'],
            'ci'                => $user_ci,
            'email'             => $data['email'],
            'office_id'         => $data['office_id'],
            'profit_percentage' => $data['profit_percentage'],
            'phone_number'      => $data['sp_prefix'].$data['phone_number'],
            'password'          => Hash::make($data['password']),
        ]);    
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // this one is for autologin after registration
        // $this->guard()->login($user);

        return redirect('/admin/index-users')->with('success', 'Usuario registrado correctamente');
    }
}
