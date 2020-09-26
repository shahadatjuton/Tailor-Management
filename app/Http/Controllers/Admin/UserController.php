<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.userList',compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.user.createUser',compact('roles'));
    }

    public function store(Request $request){

        $role = $request->role;
        if ($role == "Admin"){
            $role_id = 1;
        }elseif ($role == "Staff"){
            $role_id = 2;
        }else{
            $role_id = 3;
        }
        return $role_id;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $role;
    }
}
