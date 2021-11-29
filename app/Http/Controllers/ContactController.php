<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\ContactSend;

class ContactController extends Controller
{
    public function index(){
        $mail = Contact::get();
        return view('backend.admin.contact.index',compact('mail'));
    }

    public function json_page($id){
        $mail = Contact::findOrFail($id);
        Contact::findOrFail($id)->update([
            'read_at' => date('Y-m-d')
        ]);
        return response()->json([
            "html" => view('backend.admin.contact.models.read',compact('mail'))->render()
        ]);
    }

    public function store(Request $r){
        $r->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'massage' => 'required',
        ]);
        $status = Contact::create($r->all());
        if (!$status)
        return redirect()->back()->with('error','Massage Send Faild :(');
        Mail::to('admin@Test.org')->send(new ContactSend());
        return redirect()->back()->with('success','Massage Send Successfully :)');
    }

    public function delete($id){
        $status = Contact::destroy($id);
        if(!$status) return 0 ;
        return 1 ;
    }


}
