<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;

class UserManegeController extends Controller
{
    public $page ;
    public function __construct(){
        $group = request()->input('group');
        $this->page = ($group == 'admin'?'admin':
                      ($group == 'teacher'?'teacher':
                      ($group == 'student'?'student':'error')));
         menuActiveId(4);
    }
    public function index(){
        if(!permission('User Manage','Read')) return redirect()->back()->with('error','You have no Permission');
        if($this->page == 'error')
        return redirect()->back()->with('error','Page Is Missing :(');
        $user = User::where('role_name',ucfirst($this->page))->get();
        if(!$user)
        return redirect()->back()->with('error',ucfirst($this->page).'Role Is Missing :(');
        return view('backend.admin.user.'.$this->page,compact('user'));
    }
    public function show(){
        if(!permission('User Manage','Read')) return redirect()->back()->with('error','You have no Permission');
        if($this->page == 'error') return 0;
        if(request()->input('id')){
            $user = User::findOrFail(request()->input('id'));
            $class = Course::get();
            if($this->page == ('student'||'teacher')){
                return response()->json([
                    "html" => view('backend.admin.user.modals.'.$this->page,compact('user','class'))->render()
                ]); 
            }
        }
        $role = Role::where('name',ucfirst($this->page))->first();
        $class = Course::get();
        if(!$role) 
        return redirect()->back()->with('error',ucfirst($this->page).'Role Is Missing :(');
        if($this->page == ('student'||'teacher')){
             return response()->json([
                 "html" => view('backend.admin.user.modals.'.$this->page,compact('role','class'))->render()
             ]); 
        }
        return response()->json([
            "html" => view('backend.admin.user.modals.'.$this->page,compact('role'))->render()
        ]);
    }
    public function store(Request $r){
        if(!permission('User Manage','Create')) return redirect()->back()->with('error','You have no Permission');
        $ValidateFieldCheck= [];
        if($this->page == 'error') return redirect()->back()->with('error','Terget Miss :(');
        if($this->page == 'student') {
            $ValidateFieldCheck = array_merge($ValidateFieldCheck,[
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|min:11|max:15',
                'course' => 'required',
                'role_name' => 'required',
                'password' => 'required',
            ]);
        }        
        if($this->page == 'teacher') {
            $ValidateFieldCheck = array_merge($ValidateFieldCheck,[
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|min:11|max:15',
                'expertIn' => 'required',
                'eq' => 'required',
                'Address' => 'required',
                'cv' => 'required|max:2048',
                'role_name' => 'required',
                'password' => 'required',
            ]);
        }
        $r->validate($ValidateFieldCheck);
        $data = $r->all();
        if($this->page == 'teacher') {
            $data['expertIn'] =  json_encode($r->expertIn);
            $cvName = time().'-'.rand(1,99999).'.'.$r->cv->extension();
            $r->cv->move(public_path('cv'), $cvName);
            $data['cv'] = $cvName;
        }
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return redirect()->back()->with('success','USer Add Successfully');
    }
    
    public function update(Request $r){
        if(!permission('User Manage','Update')) return redirect()->back()->with('error','You have no Permission');
        if($this->page == 'error') 
        return redirect()->back()->with('error','Terget Miss :(');
        $id = request()->input('id');
        $data = $r->all() ;
        unset($data['role']);
        User::findOrFail($id)->update($data);
        return redirect()->back()->with('success','User Update Successfully');
    }
    public function delete_user($id){
        if(!permission('User Manage','Delete')) return redirect()->back()->with('error','You have no Permission');
        $status = User::destroy($id);
        if(!$status) return 0 ;
        return 1 ;
    }
}
