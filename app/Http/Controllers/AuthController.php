<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserProfile;
use App\Models\UserToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login()
	{
		return view('auth.login');
	}

	public function postlogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		if (Auth::attempt($request->only('email', 'password'))) {
			// create user activity
			UserActivity::create([
				'ip_address' => $request->ip(),
				'user_agent' => $request->header('User-Agent'),
				'user_id' => user()->id 
			]);
			// check level
			if (user()->status == 'active') {
				if (user()->role->name == 'apoteker' || user()->role->name == 'doctor' || user()->role->name == 'admin' ) {
					return redirect('/backend')->with('success', 'Login success');
				} else {
					return redirect('/')->with('success', 'Login success');
				}
			}
		} else {
			return back()->with('error', 'Wrong Email or Password');
		}
	}

	public function register()
	{
		return view('auth.register');
	}

	public function postRegister(Request $request)
	{
		$this->validate($request, [
			'username' => 'required|min:3|max:10|regex:/^[a-zA-Z]+$/u',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6',
		]);

		$request['password'] = bcrypt($request->password);
		$request['role_id'] = 2;

		$user = User::create($request->all());

		return redirect('auth/login')->with('alert-success', 'Register is successfully');
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/')->with('success', 'Logout success');
	}

	public function verification($token, $email, $type)
	{
		$user = User::where('email', $email)->first();

		if ($user) {
			if (!is_null($user->token->verify) || !is_null($user->token->reset)) {
				if ($type == 'verify') {
					if ($user->token->verify == $token) {
						if ($user->token->expired > time()) {
							$user->status = 'active';
							$user->update();
							$user->token->verify = null;
							$user->token->expired = null;
							$user->token->update();

							return redirect('auth/login')->with('success', 'Akun berhasil diaktifkan, silahkan login');
						} else {
							$user->profile->delete();
							$user->token->delete();
							$user->delete();

							return redirect('auth/login')->with('error', 'Token kadaluarsa, Harap registrasi kembali');
						}
					} else {
						return redirect('auth/login')->with('error', 'Token tidak valid');
					}
				} else if ($type == 'reset') {
					echo "password reset";
				} else {
					return redirect('auth/login')->with('error', 'Verifikasi tidak valid');
				}
			} else {
				return redirect('auth/login')->with('error', 'Akun anda sudah aktif');
			}
		} else {
			return redirect('auth/login')->with('error', 'Email tidak terdaftar');
		}
	}
}
