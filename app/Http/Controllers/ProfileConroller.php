<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class ProfileConroller extends Controller
{
    public function __construct(){

    }
    public function index(){
        $course = Course::get();
        return view('backend.user.profile.index',compact('course'));
    }
    public function profile_image_update(Request $r){
        $r->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $img = User::findOrFail($r->id)->img;
        $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
        $r->image->move(public_path('images/profile'), $imageName);

        if(!is_null($img)){
            if(file_exists(trim(public_path('images\profile\ ')).$img))
            unlink(trim(public_path('images\profile\ ')).$img);
        }
        
        $status = User::findOrFail($r->id)->update(['img' => $imageName]);
        if ($status)
        return redirect()->back()->with('success','Your Profile Image Updated :)');
        return redirect()->back()->with('error','Your Profile Image Update Failed :(');
    }

    public function profile_info_update(Request $r){
        $id = $r->id;
        unset($r->id);

        if(isset($r->expertIn))
        $r->expertIn = json_encode($r->expertIn);

        $status = User::findOrFail($r->id)->update($r->all());
        if ($status)
        return redirect()->back()->with('success','Your Profile Info Updated :)');
        return redirect()->back()->with('error','Your Profile Info Update Failed :(');
    }
}
