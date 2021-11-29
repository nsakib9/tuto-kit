<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function __construct(){
       menuActiveId(3);
    }
    public function show($sub = false){
        if(!permission('Subject Manage','Read')) return redirect()->back()->with('error','You have no Permission');

        if($sub && request()->input('edit')){
            $subject = Subject::with('course')->findOrFail(request()->input('id'));
            $class = Course::get();
            return response()->json([
                "data" => view('backend.admin.class.create_subject',compact('subject','class'))->render()
            ]); 
        }
        $class = Course::get();
        return response()->json([
            "data" => view('backend.admin.class.create_subject',compact('class'))->render()
        ]);  
    }

    public function store(Request $r){
        if(!permission('Subject Manage','Create')) return redirect()->back()->with('error','You have no Permission');
        $r->validate([
            'course_id' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $r->all();
            $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
            $r->image->move(public_path('images'), $imageName);
       
        $data = [
            'course_id' => $data['course_id'],
            'title' => $data['title'],
            "description" => $data['description'],
            'img' =>  $imageName,
        ];
        if(isset($data['status']))
        $data['status'] = $data['status'] == 'on' ? 1 : 0;

        Subject::create($data);
        return redirect()->back();
    }

    public function update(Request $r){
        if(!permission('Subject Manage','Update')) return redirect()->back()->with('error','You have no Permission');

        $id = $r->id;
        $img = Subject::findOrFail($id)->img;
        $data = [
            "course_id" => $r->course_id,
            "title" => $r->title,
            "description" => $r->description,
            'status' => $r->status == 'on' ? 1 : 0,
        ];
        if(isset($r->image)){
            $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
            $r->image->move(public_path('images'), $imageName);
            unlink(trim(public_path('images\ ')).$img);
            $data['img'] = $imageName;
        }
        Subject::findOrFail($id)->update($data);
        return redirect()->back();
    }

    public function delete($id){
        if(!permission('Subject Manage','Delete')) return redirect()->back()->with('error','You have no Permission');
        $img = Subject::findOrFail($id)->img;
        $status = Subject::destroy($id);
        if(!$status) return 0 ;
        unlink(trim(public_path('images\ ')).$img);
        return 1 ;
    }
}
