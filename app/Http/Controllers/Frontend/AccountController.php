<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function editProfile()
    {
        return view('frontend.user.profile.edit');
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'username' => 'required|max:20|regex:/^[a-zA-Z]+$/u',
            'file' => 'image|mimes:jpg,jpeg,png|max:1024'
        ];

        if ($request->hasFile('file')) {
            if (!is_null(user()->image)) {
                unlink('./img/user/' . user()->profile->image);
            }

            $file = $request->file('file');
            $filename = rand(111111, 999999) . '.' . $file->getClientOriginalExtension();
            $file->move('./img/user', $filename);

            $request['image'] = $filename;
        }

        user()->update($request->all());

        return redirect('user/profile/edit')->with('success', 'Profile has been updated');
    }

    
    public function password()
    {
        return view('frontend.user.password.edit');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password'
        ]);

        $user = User::find(user()->id);

        if (password_verify($request->old_password, $user->password)) {
            $request['password'] = bcrypt($request->password);

            $user->update($request->all());

            return redirect('user/profile/edit')->with('success', 'Password berhasil diubah');
        } else {
            return back()->with('error', 'Password lama salah');
        }
    }
}
