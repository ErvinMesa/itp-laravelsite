<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.permissions:1');
    }

    public function index(){
        $users = User::select()->get();
        $roles = \App\UserRoles::select()->get();
        return view('content_pages.user_management.index',['users'=>$users,'roles'=>$roles]);
    }

    public function update(Request $request, User $user){
        $permission = $request->json('user_role');
        $user->user_role = $permission;
        $user->save();
        return response($user->user_role);
    }
}
