<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helper\CustomeClass;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Auth;

class UserController extends Controller
{

    public function index(){
        $users= User::with('roles:id,name')->orderBy('created_at','DESC')->get();
        return view('backend.pages.user.index',compact('users'));
    }

    public function create(){
        if(!Auth::user()->hasPermissionTo('add user')) return back()->with('error','you are not elligable to access');
        $roles = Role::all();
        return view('backend.pages.user.create',compact('roles'));
    }

    public function store(Request $request){
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        $user->syncRoles($request->roles);
        if($user){
            CustomeClass::ActivityLoger(auth()->user()->id, 'Add New User','Success','User Create Successfully',$user);
            return redirect()->back()->with('message','Data added Successfully');
        }

    }
}
