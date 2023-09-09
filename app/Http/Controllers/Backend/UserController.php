<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helper\CustomeClass;

class UserController extends Controller
{
    public function index(){
        return view('backend.pages.user.index');
    }

    public function create(){
        return view('backend.pages.user.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= $request->password;
        $user->save();
        if($user){
            CustomeClass::ActivityLoger(auth()->user()->id, 'Add New User','Success','User Create Successfully',$user);
            return redirect()->back()->with('message','Data added Successfully');
        }

    }
}
