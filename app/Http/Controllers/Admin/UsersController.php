<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user'=> $user,
            'roles' => $roles,
        ]);

        
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if($user->save()){
            $request->session()->flash('success', 'Information has been Updated');
        }else{
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request, User $user)
    {
        $user->roles()->detach();

        if($user->delete()){
            $request->session()->flash('success', 'User has been deleted');
        }else{
            $request->session()->flash('error', 'There was an error deleting the user');
        }

        return redirect()->route('admin.users.index');
    }
}
