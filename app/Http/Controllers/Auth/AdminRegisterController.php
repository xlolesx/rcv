<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class AdminRegisterController extends Controller
{
	public function showRegistrationForm()
	{
		return view('auth.admin.admin-register');
	}

	public function register(Request $request)
	{
		$this->validate(
			$request, [
            'name' => ['required', 'string', 'max:255', 'min:2', 'unique:admins'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone_number'      => ['min:5', 'max:8', 'regex:/[^A-Za-z-\s]+$/'],
            'ci'                => ['required', 'max:10', 'min:7', 'unique:users', 'regex:/[^A-Za-z-\s]+$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed']],
            [
            'name.required' => 'Este campo no puede estar vacio',
            'name.min' 	  	=> 'El nombre de usuario debe contener al menos 2 letras',
            'name.max' 	  	=> 'El nombre de usuario no puede ser mas largo que 255 caracteres',
            'name.unique' 	=> 'Este nombre de usuario ya esta en uso',
            'email.required' => 'Este campo no puede estar vacio',
            'email.email' 	 => 'Correo electronico invalido',
            'email.max' 	 => 'El correo electronico no puede ser mas largo que 255 caracteres',
            'email.unique' 	 => 'Este orreo electronico ya esta en uso',
            'password.required' => 'Este campo no puede estar vacio',
            'password.min' 		=> 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed'=> 'La contraseña no coincide',
            'ci.required'       => 'Este campo no puede estar vacio',
            'ci.regex'          => 'Este campo no puede contener letras o espacios',
            'ci.min'            => 'La cedula debe tener al menos 2 numeros',
            'ci.max'            => 'La cedula no debe tener mas de 10 numeros',
            'ci.unique'         => 'Esta cedula ya esta en uso',
            'phone_number.min'           => 'Este campo debe tener al menos 5 números',
            'phone_number.max'           => 'Este campo no puede tener mas de 7 números',
            'phone_number.regex'         => 'Este campo no puede tener letras o espacios',
		]);

		$user = new Admin;
		$user->name = $request->input('name');
		$user->email = $request->input('email');
            $user->ci = $request->input('id_type').$request->input('ci');
            $user->phone_number = $request->input('sp_prefix').$request->input('phone_number');
		$password = Hash::make($request->input('password'));
		$user->password = $password;
		$user->save();

		return redirect('/admin/index-admins');
	}
}
