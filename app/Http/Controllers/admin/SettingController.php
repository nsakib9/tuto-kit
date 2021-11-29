<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Option;
use App\Models\Menu;
use App\Models\Review;

class SettingController extends Controller
{
    protected $group ;
    public function __construct(){
        $group = request()->input('group');
        $this->group = ($group == 'logo'?'logo':
                       ($group == 'page'?'page':
                       ($group == 'css'?'css':
                       ($group == 'lesson'?'lesson':
                       ($group == 'review'?'review':
                       ($group == 'footer'?'footer':
                       ($group == 'menu'?'menu':
                       ($group == 'page'?'page':'error'))))))));
           
       menuActiveId(8);
    
    }
    public function index(){
        // Check Page is Valid;
        if($this->group == 'error') 
        return redirect()->back()->with('error','Page Not found');      

        if($this->group == 'logo'){
              menuActiveId(8,1);
            if(!permission('Setting Manage','Logo Read')) return redirect()->back()->with('error','You have no Permission');
            $logo = Option::where('type','logo')->first();
            return view('backend.admin.setting.logo',compact('logo'));
        }

        if($this->group == 'css'){
             menuActiveId(8,3);
            if(!permission('Setting Manage','CSS Builder Read')) return redirect()->back()->with('error','You have no Permission');
            $css = Option::where('type','css')->get();
            return view('backend.admin.setting.css',compact('css'));
        }

        if($this->group == 'page'){
             menuActiveId(8,2);
            if(!permission('Setting Manage','Page Builder Read')) return redirect()->back()->with('error','You have no Permission');
            $page = null ;
            if(request()->input('id')) $page = Option::findOrFail(request()->input('id'));
            else $page = Option::where('type','page')->get();
            return view('backend.admin.setting.page',compact('page'));
        }
        if($this->group == 'footer'){
             menuActiveId(8,7);
            if(!permission('Setting Manage','Footer Read')) return redirect()->back()->with('error','You have no Permission');
            $footer = Option::where('type','footer')->get();
            $foot = [];
            if(count($footer) > 0){
                foreach($footer as $row){
                    array_push($foot,$row->content);
                }
            }
            return view('backend.admin.setting.footer',compact('foot'));
        }

        if($this->group == 'lesson'){
             menuActiveId(8,4);
            if(!permission('Setting Manage','Popular Lession Read')) return redirect()->back()->with('error','You have no Permission');
            $lesson = Option::where('type','lesson')->first()->content;
            return view('backend.admin.setting.lesson',compact('lesson'));
        }

        if($this->group == 'review'){
             menuActiveId(8,5);
            if(!permission('Setting Manage','Review Read')) return redirect()->back()->with('error','You have no Permission');
             $review = Review::get();
            return view('backend.admin.setting.review',compact('review'));
        }

        if($this->group == 'menu'){
             menuActiveId(8,6);
            if(!permission('Setting Manage','Nav Menu Link Read')) return redirect()->back()->with('error','You have no Permission');
            $menu = Menu::get();
            return view('backend.admin.setting.menu',compact('menu'));
        }

        return redirect()->back()->with('error','URL invaild');
    }

    public function modal(){
        // Check Page is Valid;
        if($this->group == 'error') return 0;

        if($this->group == 'logo'){
            if(!permission('Setting Manage','Logo Read')) return redirect()->back()->with('error','You have no Permission');
            $logo = Option::where('type','logo')->first();
            return response()->json([
                "html" => view('backend.admin.setting.modals.logo',compact('logo'))->render()
            ]);
        }
        if($this->group == 'css'){
            if(!permission('Setting Manage','CSS Builder Read')) return redirect()->back()->with('error','You have no Permission');
            if(request()->input('id')) { 

                $css = Option::where('id',request()->input('id'))->first();
                return response()->json([
                    "html" => view('backend.admin.setting.modals.css',compact('css'))->render()
                ]);

            }

            return response()->json([
                "html" => view('backend.admin.setting.modals.css')->render()
            ]);
        }
        if($this->group == 'menu'){
            if(!permission('Setting Manage','Nav Menu Link Read')) return redirect()->back()->with('error','You have no Permission');
            if(request()->input('id')) { 

                $menu = Menu::findOrFail(request()->input('id'));
                return response()->json([
                    "html" => view('backend.admin.setting.modals.menu',compact('menu'))->render()
                ]);

            }

            return response()->json([
                "html" => view('backend.admin.setting.modals.menu')->render()
            ]);
        }
        if($this->group == 'review'){
            if(!permission('Setting Manage','Review Read')) return redirect()->back()->with('error','You have no Permission');
            if(request()->input('id')) { 

                $review = Review::findOrFail(request()->input('id'));
                return response()->json([
                    "html" => view('backend.admin.setting.modals.review',compact('review'))->render()
                ]);

            }

            return response()->json([
                "html" => view('backend.admin.setting.modals.review')->render()
            ]);
        }
        return 0 ;
    }
    public function store(Request $r){
        // Check Page is Valid;
        if($this->group == 'error') return 0;

        if($this->group == 'logo'){
            if(!permission('Setting Manage','Logo Create')) return redirect()->back()->with('error','You have no Permission');
            $data = $r->all();
            $img = Option::where('type','logo')->first()->logoimg; 
            $data['type'] = 'logo';

            // IF IMAGE SUBMIT
            if(isset($r->image)){
                $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
                $r->image->move(public_path('images/logo'), $imageName);
                if(!is_null($img)){
                    if(file_exists(trim(public_path('images\logo\ ')).$img))
                    unlink(trim(public_path('images\logo\ ')).$img);
                }
                $data['logoimg'] = $imageName;
            }
            unset($data['_token']);
            unset($data['group']);
            unset($data['image']);
            $status = Option::where('type','logo')->update($data);
            if(! $status) return redirect()->back()->with('error','Logo upload faild :(');
            return redirect()->back()->with('success','Logo upload Success :)');

        }

        if($this->group == 'css'){
            if(!permission('Setting Manage','CSS Builder Create')) return redirect()->back()->with('error','You have no Permission');
            $r->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
            $data = [
                'type' => 'css',
                'title' => $r->title,
                'content' => $r->content,
                'status' => $r->status == 'on' ? 1 : '', 
            ];
            $status = Option::create($data);
            if(! $status) return redirect()->back()->with('error','Custom CSS Create faild :(');
            return redirect()->back()->with('success','Custom CSS Create Success :)');
        }

        if($this->group == 'review'){
            if(!permission('Setting Manage','Review Create')) return redirect()->back()->with('error','You have no Permission');
            $r->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',

            ]);
            $data = [
                'title' => $r->title,
                'subtitle' => $r->subtitle,
                'body' => $r->body,
                'status' => $r->status, 
            ];

            if($r->image){
                $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
                $r->image->move(public_path('images/review'), $imageName);
                $data['img'] =  $imageName ;
            }


            $status = Review::create($data);
            if(! $status) return redirect()->back()->with('error','Review Create faild :(');
            return redirect()->back()->with('success','Review Create Success :)');
        }

        if($this->group == 'menu'){
            if(!permission('Setting Manage','Nav Menu Link Create')) return redirect()->back()->with('error','You have no Permission');
            $r->validate([
                'title' => 'required',
            ]);
            
             $data = [
                'title' => $r->title,
                'url' => $r->url,
                'dropdown' => $r->dropdown == 'on' ? 1 : 0, 
                'is_sub' => 0 ,
                'status' => $r->status == 'on' ? 1 : 0, 
            ];
            if(isset($r->main_id)){
                $data = [
                    'title' => $r->title,
                    'url' => $r->url,
                    'main_id' => $r->main_id,
                    'dropdown' => 0, 
                    'is_sub' => 1 ,
                    'status' => $r->status == 'on' ? 1 : 0, 
                ];
            }
            $status = Menu::create($data);
            if(! $status) return redirect()->back()->with('error','Menu link Create faild :(');
            return redirect()->back()->with('success','Menu link Create Success :)');
        }

        return redirect()->back()->with('error','Invalid Form :(');
    }

    public function update(Request $r){
        // Check Page is Valid;
        if($this->group == 'error') return 0;

        if($this->group == 'css'){
            if(!permission('Setting Manage','CSS Builder Update')) return redirect()->back()->with('error','You have no Permission');
            $id = Request()->input('id');
            $data = [
                'title' => $r->title,
                'content' => $r->content,
                'status' => $r->status == 'on' ? 1 : 0,
            ];
            $status = Option::find($id)->update($data);
            if(!$status) return redirect()->back()->with('error','css upload faild');
            return redirect()->back()->with('success','css upload success');
        }
        if($this->group == 'menu'){
            if(!permission('Setting Manage','Nav Menu Link Update')) return redirect()->back()->with('error','You have no Permission');
            $id = $r->id;
            unset($r->id);
            $data = [
                'title' => $r->title,
                'url' => $r->url,
                'dropdown' => $r->dropdown == 'on' ? 1 : 0, 
                'is_sub' => 0 ,
                'status' => $r->status == 'on' ? 1 : 0, 
            ];
            if(isset($r->sub)){
                $data = [
                    'title' => $r->title,
                    'url' => $r->url,
                    'dropdown' => 0, 
                    'is_sub' => 1 ,
                    'status' => $r->status == 'on' ? 1 : 0, 
                ];
            }
            $status = Menu::find($id)->update($data);
            if(!$status) return redirect()->back()->with('error','Menu update faild');
            return redirect()->back()->with('success','Menu update success');
        }

        if($this->group == 'review'){
            if(!permission('Setting Manage','Review Update')) return redirect()->back()->with('error','You have no Permission');
            $id = $r->id;
            unset($r->id);
            $img = Review::findOrFail($id)->img;

            $data = [
                'title' => $r->title,
                'subtitle' => $r->subtitle,
                'body' => $r->body,
                'status' => $r->status, 
            ];

            if($r->image){
                $imageName = time().'-'.rand(1,99999).'.'.$r->image->extension();
                $r->image->move(public_path('images/review'), $imageName);
                $data['img'] =  $imageName ;

                if(file_exists(trim(public_path('images\review\ ')).$img))
                unlink(trim(public_path('images\review\ ')).$img);
            }
            if(isset($r->sub)){
                $data = [
                    'title' => $r->title,
                    'url' => $r->url,
                    'dropdown' => 0, 
                    'is_sub' => 1 ,
                    'status' => $r->status, 
                ];
            }
            $status = Review::find($id)->update($data);
            if(!$status) return redirect()->back()->with('error','Review update faild');
            return redirect()->back()->with('success','Review update success');
        }


        if($this->group == 'lesson'){
            if(!permission('Setting Manage','Popular Lession Update')) return redirect()->back()->with('error','You have no Permission');
            $has = Option::where('type','lesson')->where('status',$r->status)->first();
            if(! $has){
             Option::create([
                 'type' => 'lesson',
                 'content' => $r->content,
                 'status' => $r->status
             ]);
             return redirect()->back()->with('success','Lesson Html Code Create success');
            }else{
             $has->update([
                 'content' => $r->content
             ]);
             return redirect()->back()->with('success','Lesson Html Code update success');
            }
         }


        if($this->group == 'footer'){
           if(!permission('Setting Manage','Footer Update')) return redirect()->back()->with('error','You have no Permission');
           $has = Option::where('type','footer')->where('status',$r->status)->first();
           if(! $has){
            Option::create([
                'type' => 'footer',
                'content' => $r->content,
                'status' => $r->status
            ]);
            return redirect()->back()->with('success','Footer Html Code Create success');
           }else{
            $has->update([
                'content' => $r->content
            ]);
            return redirect()->back()->with('success','Footer Html Code update success');
           }
        }
    }

    public function delete($id,$status=false){
        if($this->group == 'menu')
        $status = Menu::destroy($id);

        elseif($this->group == 'review'){
            if(!permission('Setting Manage','Review Delete')) return 0;
            $img = Review::findOrFail($id)->img;
            if(!is_null($img)){
                if(file_exists(trim(public_path('images\review\ ')).$img))
                unlink(trim(public_path('images\review\ ')).$img);
            }
            $status = Review::destroy($id);
        }

        else $status = Option::destroy($id);

        if(!$status) return 0;

        return 1;
    }
    public function get_sub_menu($id){
        $data = Menu::where('main_id',$id)->get();
        return response()->json($data);
    }
    public function temp_save(Request $r){
        $file_name = date("Y-m-d").rand(0,99999999).'.'.$r->file->extension();
        $r->file->move(public_path().'\\temp\\', $file_name);
        return base_url.'temp/'.$file_name;
    }
    public function temp_delete(Request $r){
        $img = $r->img;
        $old_dir = Str::replace(base_url,'',$img);
        unlink(public_path($old_dir));
        return response()->json(['status'=>true]);
    }
    public function store_page(Request $r){
        if(!permission('Setting Manage','Page Builder Create')) return 0;
        $status = $r->status;
        $title = $r->title;
        $img = json_decode($r->img);
        $body = $r->body;
      
        $data = [
            'type' => 'page',
            'title' => $title,
            'header' => $r->header,
            'footer' => $r->footer,
            'status' => $status
        ];
        if(count($img) > 1){
            foreach($img as $im){
             $old_dir = Str::replace(base_url,'',$im);
             $old_img = Str::replace(base_url.'temp/','',$im);
             $new_img = rename(public_path($old_dir),public_path('images/page_builder_img/'.$old_img));
             $body = Str::replace($im,base_url.'images/page_builder_img/'.$old_img,$body);

            }
        }else if(count($img) == 1){
                $old_dir = Str::replace(base_url,'',$img[0]);
                $old_img = Str::replace(base_url.'temp/','',$img[0]);
                $new_img = rename(public_path($old_dir),public_path('images/page_builder_img/'.$old_img));
                $body = Str::replace($img[0],base_url.'images/page_builder_img/'.$old_img,$body);
        }
        
      $data = array_merge($data, ['content' => $body,'url' =>  Str::replace(' ','_',$r->title)]);
        $data = Option::create($data);
        return response()->json($data);
    }

    public function update_page(Request $r){
        if(!permission('Setting Manage','Page Builder Update')) return 0;
        $id = $r->id;

        $status = $r->status;
        $title = $r->title;
        $img = json_decode($r->img);
        $body = $r->body;
      
        $data = [
            'type' => 'page',
            'title' => $title,
            'header' => $r->header,
            'footer' => $r->footer,
            'status' => $status
        ];
        if(count($img) > 1){
            foreach($img as $im){
             $old_dir = Str::replace(base_url,'',$im);
             $old_img = Str::replace(base_url.'temp/','',$im);
             $new_img = rename(public_path($old_dir),public_path('images/page_builder_img/'.$old_img));
             $body = Str::replace($im,base_url.'images/page_builder_img/'.$old_img,$body);

            }
        }else if(count($img) == 1){
                $old_dir = Str::replace(base_url,'',$img[0]);
                $old_img = Str::replace(base_url.'temp/','',$img[0]);
                $new_img = rename(public_path($old_dir),public_path('images/page_builder_img/'.$old_img));
                $body = Str::replace($img[0],base_url.'images/page_builder_img/'.$old_img,$body);
        }
        
        $data = array_merge($data, ['content' => $body,'url' =>  Str::replace(' ','_',$r->title)]);
        $data = Option::find($id)->update($data);
        return response()->json($data);
    } 
}
