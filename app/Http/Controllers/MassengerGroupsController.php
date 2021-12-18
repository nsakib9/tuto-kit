<?php

namespace App\Http\Controllers;

use App\Models\MessengerGroup;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use RTippin\Messenger\Models\Thread;
use RTippin\Messenger\Models\Participant;


class MassengerGroupsController extends Controller
{
    public function index(){
          if(!permission('Magenger Group','Read')) return redirect()->back()->with('error','You have no Permission');
        // $groups = is_super() ? MessengerGroup::get()
        //                      : MessengerGroup::where('admin',auth()->id())->get();

        $groups = is_super() ? Thread::get()
                             : Thread::where('admin',auth()->id())->get();

        return view('backend.admin.massenger.index',compact('groups'));
    }
    public function modal(){
        $user = User::where('role_name','Teacher')->get();
        
        if(request()->input('id')){
           if(!permission('Magenger Group','Create')) return 0;

            $group = Thread::find(request()->input('id'));
            return response()->json([
                "html" => view('backend.admin.massenger.modals.add',compact('user','group'))->render()
            ]);
        }



        if(request()->input('manege')){
            if(!permission('Magenger Group',"Add/Remove")) return 0;

            $id = request()->input('data');
            session()->put('MessengerGroupName',request()->input('data'));
            $class = Course::get();
            return response()->json([
                "html" => view('backend.admin.massenger.modals.menege',compact('class','id'))->render()

            ]);
        }



        if(!permission('Magenger Group','Create')) return 0;

        return response()->json([
            "html" => view('backend.admin.massenger.modals.add',compact('user'))->render()
        ]);
    }
    public function store(Request $r){
         if(!permission('Magenger Group','Create')) return redirect()->back()->with('error','You have no Permission');
        $r->validate([
            "name" => "required",
            "admin" => "required",
        ]);


        $createGroup = Thread::create([
            'id' => Str::uuid()->toString(),
            'type' => 2,
            'subject' => $r->name,
        ]);

        $assignAdminToGroup = Participant::create([
            'id' => Str::uuid()->toString(),
            'thread_id' => $createGroup->id,
            'owner_type' => 'App\Models\User',
            'owner_id' => $r->admin,
            'admin' => 1
        ]);


        // if(MessengerGroup::create([
        //     'name' => $r->name,
        //     'admin' => $r->admin,
        // ]))
        return redirect()->back()->with('success','Massenger Group Create Successfully');
        return redirect()->back()->with('error','Massenger Group Create faild');
    }
    public function update(Request $r){
         if(!permission('Magenger Group','Update')) return redirect()->back()->with('error','You have no Permission');
        $id = $r->id ;
        if(MessengerGroup::find($id)->update($r->except('_token')))
            return redirect()->back()->with('success', 'Massenger Group Change Success');
        return redirect()->back()->with('error', 'Massenger Group Change Faild');
    }

    public function delete($id){
         if(!permission('Magenger Group','Delete')) return 0;
        if(MessengerGroup::destroy($id))
            return 1;
        return 0;
    }


    public function getMembers(){
         if(!permission('Magenger Group',"Add/Remove")) return 0;
        $user = null ;
        $data = request()->input('data');
        if($data == 'teacher')
        $user = User::where('role_name','Teacher')->get();
        else
        $user = User::where('course',$data)->get();
        $members = MessengerGroup::find(session()->get('MessengerGroupName'));
        $members = $members ? json_decode($members->member ? $members->member : "[]") : [] ;

        return response()->json(['user' => $user , 'members' => $members]);
    }

    public function member($group,$id){
        if(!permission('Magenger Group',"Add/Remove")) return 0;
       $group = MessengerGroup::find($group);
       if(!$group->member){
            $group->update([ 'member' => json_encode([$id]) ]);
            return response()->json([ 'status' => 'added' ]);
       }
       $members = json_decode($group->member);
         if(in_array($id,$members)){
            $index = array_search($id,$members);
                     array_splice($members,$index,1);
                     $group->update([ 'member' => json_encode($members) ]);
            return response()->json([ 'status' => 'removed' ]);
         }
        array_push($members,$id);
        $group->update([ 'member' => json_encode($members) ]);
        return response()->json([ 'status' => 'added' ]);

    }
}
