<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Rules\Captcha;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/dashboard';

    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        // $messages = [
        //     'username.exists' => "El nombre de usuario proporcionado es incorrecto",
        // ];

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
            'g-recaptcha-response' => new Captcha()
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // redirect if succesfull
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors(['Usuario o contraseña incorrectos.']);
        // return redirect()->back()
        //     ->withInput($request->only('username'))
        //     ->withErrors(['password' => 'Contraseña incorrecta']);
    }
}
