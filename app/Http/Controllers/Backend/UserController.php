<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return view('backend.user.index', compact('users'));
    }

    public function create() 
    {
        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
            'email'    => 'required|email',
            'role'     => 'required'
        ]);

        $request['password'] = bcrypt($request->password);
        $request['role_id']  = $request->role;

        User::create($request->all());

        return redirect('backend/users')->with('success', 'User has been added');

    }

    public function edit(User $user) 
    {
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request) 
    {
        $this->validate($request, [
            'username' => 'required',
            'email'    => 'required|email',
            'role'     => 'required'
        ]);

        $request['role_id']  = $request->role;

        $user->update($request->all());

        return redirect('backend/users')->with('success', 'User has been edited');
    } 

    public function destroy(User $user) 
    {
        $user->delete();

        return redirect('backend/users')->with('success', 'User has been deleted');
    }
}
