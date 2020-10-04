<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    
    public function index(User $user)
    {
        if($user->profile === null){
            return redirect()->route('profile.create',['user'=>$user->id]);
        }
        return view('content_pages.personal_details.index',compact('user'));
    }

    public function edit(User $user){
        return view('content_pages.personal_details.edit',compact('user'));
    }
    
    public function update(User $user){
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
    
    public function create(User $user){
        return view('content_pages.personal_details.create',compact('user'));
    }

    public function store(User $user){
        $profiledata = request()->validate([
            'address' => 'nullable',
            'contact' => 'nullable',
            'quote' => 'nullable',
        ]);
        $profiledata["user_id"] = $user->id;
        \App\Profile::create($profiledata);
        return redirect()->route('profile.show',['user'=>$user->id]);
    }

    public function data(User $user){
        return response()->json(["id"=>$user->id]);
    }
}
