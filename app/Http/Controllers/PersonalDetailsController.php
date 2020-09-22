<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalDetailsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(\App\User $user)
    {
        return view('content_pages.personal_details.index',compact('user'));
    }

    public function edit(\App\User $user){
        return view('content_pages.personal_details.edit',compact('user'));
    }
    
    public function update(\App\User $user){
        $userdata = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $profiledata = request()->validate([
            'address' => 'nullable',
            'contact' => 'nullable',
            'quote' => 'nullable'
        ]);
        $user->update($userdata);
        $user->profile->update($profiledata);
        return redirect("/profile/{$user->id}");
    }
}
