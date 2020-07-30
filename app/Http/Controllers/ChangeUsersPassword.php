<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;

class ChangeUsersPassword extends Controller
{
	public function edit_password($id){
		return view('user-modules.Password.change-password', compact('id'));
	}

	public function update_password(Request $request, $id){
		$this->validate($request, [
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

		$user = User::findOrFail($id);
		$user->password = Hash::make($request->password);
		$user->save();

		return redirect('/dashboard')->with('success', 'Contraseña actualizada correctamente');

	}
}
