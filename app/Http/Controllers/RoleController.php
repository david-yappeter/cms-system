<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::paginate(10);
        return view("admin.roles.list", ['roles'=>$roles]);
    }

    public function show(Role $role) {
        return view("admin.roles.show", ['role'=>$role, 'users' => $role->users]);
    }

    public function create() {
        $roles = Role::paginate(10);
        return view("admin.roles.create",['roles'=>$roles]);
    }

    public function store() {
        Role::create(request()->all());

        request()->session()->flash('message-create', "Successfully Create Role");
        return back();
    }

    public function patch(Role $role) {
        $name = request()["name"].trim(" ");
        if($role->name == $name) {
            request()->session()->flash('message-updated-no-changes', "No Changes");
            return back();
        }
        $role->name = $name;
        $role->save();

        request()->session()->flash('message-updated', "Successfully Update");
        return back();
    }

    public function destroy(Role $role) {
        $role->delete();

        request()->session()->flash('message-delete', "Successfully Delete Role");

        return back();
    }
}
