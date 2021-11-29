<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Node\Expr\AssignOp\Concat;

class CategryController extends Controller
{     
    public function __construct(){
       menuActiveId(1);
    }
    public function index(){
        $data = Category::get();
        return view('backend.admin.category.index',compact('data'));
    }
    public function show(){
        return response()->json([
            "data" => view('backend.admin.category.create')->render()
        ]);
    }
    public function edit($id){
        $data = Category::findOrFail($id);
        return response()->json([
            "data" => view('backend.admin.category.edit',compact('data'))->render()
        ]);
    }
    public function store(Request $r){
        $r->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $r->all();
        $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
        $r->image->move(public_path('images'), $imageName);
        $data = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'img' =>  $imageName
        ];
        Category::create($data);
        return redirect()->back();
    }
    public function update(Request $r){
        $id = $r->id;
        $img = Category::findOrFail($id)->img;
        $data = [
            "title" => $r->title,
            "slug" => $r->slug,
        ];
        if(isset($r->image)){
            $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
            $r->image->move(public_path('images'), $imageName);
            unlink(trim(public_path('images\ ')).$img);
            $data['img'] = $imageName;
        }
        Category::findOrFail($id)->update($data);
        return redirect()->back();
    }
    public function delete($id){
        $img = Category::findOrFail($id)->img;
        $status = Category::destroy($id);
        if(!$status) return 0 ;
        unlink(trim(public_path('images\ ')).$img);
        return 1 ;
    }
}
