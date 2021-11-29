<?php
use App\Models\Option;

if(!function_exists('logo')){
    function logo(){
           $img = Option::where('type','logo')->first();
           $html = null;
           $html .= '<img src="';
           $html .=  asset('images/logo/'.$img->logoimg) ;
           $html .=  '" alt="logo">';
           return $html;
    }
 }
 if(!function_exists('menuBar')){
    function menuBar(){

    }
 }
if(!function_exists('customCSS')){
    function customCSS(){
        $text = null;
        $file = public_path('assets/css/customCSS.css');
        $css = Option::where('type','css')->where('status','1')->get();
        foreach($css as $r){
            $text .= $r->content;
        }
        file_put_contents($file, $text);
        return '<link rel="stylesheet" href="'.asset('assets/css/customCSS.css').'">';
    }
}
if(!function_exists('html_Header')){
    function html_Header(){
        
    }
}
if(!function_exists('html_footer')){
    function html_footer(){
        
    }
}