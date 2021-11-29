<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolePermissionController extends Controller
{
    public function __construct(){
       menuActiveId(5);
    }
    public function index(){
        if(!permission('Role Manage','Read')) return redirect()->back()->with('error','You have no Permission');

        $role = Role::get();
        return view('backend.admin.role.index',compact('role'));
    }
    
    public function show(){
        if(!permission('Role Manage','Read')) return 0;

        if(request()->input('edit') && request()->input('id')){
            $role = Role::findOrFail(request()->input('id'));
            return response()->json([
                "edit" => view('backend.admin.role.role',compact('role'))->render()
    
            ]);
        }
        return response()->json([
            "create" => view('backend.admin.role.role')->render()
        ]);
    }

    public function store(Request $r){
        if(!permission('Role Manage','Create')) return redirect()->back()->with('error','You have no Permission');

        $r->validate([
            'name' => 'required',
        ]);
        // $permission = json_encode($r->permission);
        $data = [
            "name" => $r->name,
            "permission" => json_encode($r->permission),
        ];
        $success = Role::create($data);
        if($success) return redirect()->back()->with('success', "Role created Successfully");
        return redirect()->back()->with('error', "Role create failed");
    }

    public function update (Request $r){
        if(!permission('Role Manage','Update')) return redirect()->back()->with('error','You have no Permission');

        $id = $r->id;
        Role::findOrFail($id)->update([
            'name' => $r->name,
            'permission' => json_encode($r->permission),
        ]);
        return redirect()->back()->with('Role Update');
    }
    public function delete ($id){
        if(!permission('Role Manage','Delete')) return redirect()->back()->with('error','You have no Permission');

        $status = Role::destroy($id);
        if(!$status) return 0 ;
        return 1 ;
    }
}
