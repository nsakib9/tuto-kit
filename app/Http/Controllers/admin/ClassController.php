<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;

class ClassController extends Controller
{
    public function __construct(){
       menuActiveId(3);
    }
    public function index(){
        if(!permission('Class Manage','Read')) return redirect()->back()->with('error','You have no Permission');
        $class = Course::with('subject')->get();
        $subject = Subject::with('course')->get();
        return view('backend.admin.class.index',compact('class','subject'));
    }
    public function show($sub = false){
        if(!permission('Class Manage','Read')) return 0;

        return response()->json([
            "data" => view('backend.admin.class.create')->render()
        ]);
    }
    public function store(Request $r){
        if(!permission('Class Manage','Create')) return redirect()->back()->with('error','You have no Permission');

        $r->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $r->all();
        $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
        $r->image->move(public_path('images'), $imageName);
        //dd($data);
        $data = [
            'title' => $data['title'],
            'description' => $data['description'],
            'img' =>  $imageName,
        ];
        if(isset($data['status']))
        $data['status'] = $data['status'] == 'on' ? 1 : 0;
    
        Course::create($data);
        return redirect()->back();
    }

    public function edit($id){
        if(!permission('Class Manage','Read')) return redirect()->back()->with('error','You have no Permission');

        $class = Course::findOrFail($id);
        return response()->json([
            "data" => view('backend.admin.class.edit',compact('class'))->render()
        ]);
    }

    public function update(Request $r){
        if(!permission('Class Manage','Update')) return redirect()->back()->with('error','You have no Permission');

        $id = $r->id;
        $img = Course::findOrFail($id)->img;
        $data = [
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
        Course::findOrFail($id)->update($data);
        return redirect()->back();
    }
    public function delete($id){
        if(!permission('Class Manage','Delete')) return redirect()->back()->with('error','You have no Permission');

        $img = Course::findOrFail($id)->img;
        $subject = Subject::where('course_id',$id)->get();
        $ids = [];
        foreach ($subject as $row){
            $ids[] = $row->id;
        }
        $status = Course::destroy($id);
        if(!$status) return 0 ;
        $status = Subject::destroy(collect($ids));
        unlink(trim(public_path('images\ ')).$img);
        return 1 ;
    }

}
