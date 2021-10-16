<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user) {
        return view('admin.user.profile', ['user'=>$user]);
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
}
