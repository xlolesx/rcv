<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Office;
use App\Rules\Captcha;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin.admin-login');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request){
        // $messages = [
        //     'name.exists' => 'El nombre de usuario proporcionado es incorrecto',
        // ];

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:8',
            'g-recaptcha-response' => new Captcha(),
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])) {
            // redirect if succesfull
            return redirect()->intended(route('admin'));
        }

        return redirect()->back()
            ->withInput($request->only('name'))
            ->withErrors(['Usuario o contraseña incorrectos']);

        // return redirect()->back()
        //     ->withInput($request->only('name'))
        //     ->withErrors(['password' => 'Contraseña incorrecta']);
        
    }


}
