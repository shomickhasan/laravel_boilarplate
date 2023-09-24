<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Rollcontroller extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->latest()->get();
        return view('backend.pages.role.index',compact('roles'));
    }

    public function create(){

        $permission_group = User::getPermissionGroup();
        return view('backend.pages.role.create',compact('permission_group'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        $role = new Role;
        $role->name= $request->name;
        $role->save();
        $permission = new Permission;
        $role->syncPermissions($request->permission);
        if($role){
            return redirect()->back()->with('message','Role and permissions create successfully');
        }
    }

    public function edit($id){
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($id);
        return view('backend.pages.role.edit',compact('role','permissions'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'name'=>'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->update();
        $role->syncPermissions($request->permission);
        if($role){
            return redirect()->back()->with('message','Role and permissions update successfully');
        }
    }
}
