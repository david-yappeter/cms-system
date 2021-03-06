<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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
        $permissions = Permission::all();
        return view("admin.roles.show", ['role'=>$role, 'users' => $role->users, 'permissions'=>$permissions]);
    }

    public function create() {
        $roles = Role::paginate(10);
        return view("admin.roles.create",['roles'=>$roles]);
    }

    public function store() {
        $role = Role::create(request()->all());

        request()->session()->flash('message-create', "Successfully Create Role");
        return $role;
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

    public function permissionsAttach(Role $role, Permission $permission) {
        $role->permissions()->attach($permission);

        request()->session()->flash('message-updated', "Successfully Update Permissions");

        return back();
    }

    public function permissionsDetach(Role $role, Permission $permission) {
        $role->permissions()->detach($permission);

        request()->session()->flash('message-updated', "Successfully Update Permissions");

        return back();
    }
}
