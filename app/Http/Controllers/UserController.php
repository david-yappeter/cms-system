<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(10);
        return view("admin.user.list", ['users'=>$users]);
    }

    public function profile(User $user) {
        $roles = Role::all();
        return view('admin.user.profile', ['user'=>$user, 'roles'=>$roles]);
    }

    public function patch(User $user) {
        $name = request()["name"].trim(" ");
        if($user->name == $name){
            request()->session()->flash('user-updated-no-changes', "No Changes");
            return back();
        }
        $user->name = $name;
        $user->save();

        request()->session()->flash('user-updated', "Name Updated");

        return back();
    }

    public function destroy(User $user) {
        $user->delete();

        request()->session()->flash('message-delete', "Successfully Delete User");

        return back();
    }

    public function attach(User $user, Role $role) {
        $user->roles()->attach($role);

        request()->session()->flash('role-attach',  "Successfully add ".$role->name." role");

        return back();
    }

    public function detach(User $user, Role $role) {
        $user->roles()->detach($role);
        
        request()->session()->flash('role-detach', "Successfully remove ".$role->name." role");

        return back();
    }
}
