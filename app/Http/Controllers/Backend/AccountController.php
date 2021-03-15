<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function profile()
    {
        return view('backend.user.profile.index');
    }

    public function editProfile()
    {
        return view('backend.user.profile.edit');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:30',
            'file' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);

        if ($request->hasFile('file')) {
            if (!is_null(user()->image)) {
                unlink('./img/user/' . user()->image);
            }

            $file = $request->file('file');
            $filename = rand(111111, 999999) . '.' . $file->getClientOriginalExtension();
            $file->move('./img/user', $filename);

            $request['image'] = $filename;
        }

        user()->update($request->all());

        return redirect('user/account/profile')->with('success', 'Profile has been updated');
    }

    public function password()
    {
        return view('backend.user.password.index');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password'
        ]);

        $user = User::find(user()->id);
        
        
        if (password_verify($request->old_password, user()->password)) {
           
            if (password_verify($request->password, user()->password)) {
                return back()->with('error', 'Password lama tidak boleh sama denggan password baru');
            } else {
                
                $request['password'] = bcrypt($request->password);
                $user->update($request->all());

                return redirect('user/account/profile')->with('success', 'Password berhasil diubah');
            }

        } else {
            return back()->with('error', 'Password lama salah');
        }
    }
}
