<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Role;

 if(!function_exists("role_name")){
 	function role_name(){
 		return Auth::user()->role_name;
 	}
 }
 if(!function_exists("role_id")){
    function role_id(){
        return role_has()->id;
    }
}
if(!function_exists("role_has")){
    function role_has(){
        return Role::where("name",role_name())->first();
    }
}
if(!function_exists("is_super")){
    function is_super(){
        return Auth::user()->super_admin;
    }
}
if(!function_exists("is_admin")){
    function is_admin(){
        if(role_has() && role_name() == "Admin") return 1 ;
        return 0 ;
    }
}
if(!function_exists("is_teacher")){
    function is_teacher(){
        if(role_has() && role_name() == "Teacher") return 1 ;
        return 0 ;
    }
}
if(!function_exists("is_student")){
    function is_student(){
        if(role_has() && role_name() == "Student") return 1 ;
        return 0 ;
    }
}
if(!function_exists("permission")){
    function permission($title = "", $pertitle = ""){
        $array = [];
        $array[] = [
            "status" => 1,
            "title" => "Role Manage",
            "permission" => [
               [ "status" => 1, "id" => 1, "title" => "Read"],
               [ "status" => 1, "id" => 2, "title" => "Create"],
               [ "status" => 1, "id" => 3, "title" => "Update"],
               [ "status" => 1, "id" => 4, "title" => "Delete"]
            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "User Manage",
            "permission" => [
               [ "status" => 1, "id" => 5, "title" => "Read"],
               [ "status" => 1, "id" => 6, "title" => "Create"],
               [ "status" => 1, "id" => 7, "title" => "Update"],
               [ "status" => 1, "id" => 8, "title" => "Delete"]
            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "Class Manage",
            "permission" => [
               [ "status" => 1, "id" => 9, "title" => "Read"],
               [ "status" => 1, "id" => 10, "title" => "Create"],
               [ "status" => 1, "id" => 11, "title" => "Update"],
               [ "status" => 1, "id" => 12, "title" => "Delete"]
            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "Subject Manage",
            "permission" => [
               [ "status" => 1, "id" => 13, "title" => "Read"],
               [ "status" => 1, "id" => 14, "title" => "Create"],
               [ "status" => 1, "id" => 15, "title" => "Update"],
               [ "status" => 1, "id" => 16, "title" => "Delete"]
            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "Setting Manage",
            "permission" => [
               [ "status" => 1, "id" => 17, "title" => "Logo Read"],
               [ "status" => 1, "id" => 18, "title" => "Logo Create"],
               [ "status" => 1, "id" => 19, "title" => "Logo Update"],
               [ "status" => 1, "id" => 20, "title" => "Logo Delete"],

               [ "status" => 1, "id" => 21, "title" => "Page Builder Read"],
               [ "status" => 1, "id" => 22, "title" => "Page Builder Create"],
               [ "status" => 1, "id" => 23, "title" => "Page Builder Update"],
               [ "status" => 1, "id" => 24, "title" => "Page Builder Delete"],

               [ "status" => 1, "id" => 25, "title" => "CSS Builder Read"],
               [ "status" => 1, "id" => 26, "title" => "CSS Builder Create"],
               [ "status" => 1, "id" => 27, "title" => "CSS Builder Update"],
               [ "status" => 1, "id" => 28, "title" => "CSS Builder Delete"],

               [ "status" => 1, "id" => 29, "title" => "Footer Read"],
               [ "status" => 1, "id" => 30, "title" => "Footer Create"],
               [ "status" => 1, "id" => 31, "title" => "Footer Update"],
               [ "status" => 1, "id" => 32, "title" => "Footer Delete"],

               [ "status" => 1, "id" => 33, "title" => "Popular Lession Read"],
               [ "status" => 1, "id" => 34, "title" => "Popular Lession Update"],

               [ "status" => 1, "id" => 35, "title" => "Review Read"],
               [ "status" => 1, "id" => 36, "title" => "Review Create"],
               [ "status" => 1, "id" => 37, "title" => "Review Update"],
               [ "status" => 1, "id" => 38, "title" => "Review Delete"],

               [ "status" => 1, "id" => 39, "title" => "Nav Menu Link Read"],
               [ "status" => 1, "id" => 40, "title" => "Nav Menu Link Create"],
               [ "status" => 1, "id" => 41, "title" => "Nav Menu Link Update"],
               [ "status" => 1, "id" => 42, "title" => "Nav Menu Link Delete"],
            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "Side Bar",
            "permission" => [
               0 => [ "status" => 1, "id" => 43, "title" => "Class"],
               1 => [ "status" => 1, "id" => 44, "title" => "User Manage"],
               2 => [ "status" => 1, "id" => 45, "title" => "Role Manage"],
               3 => [ "status" => 1, "id" => 46, "title" => "Contact"],
               4 => [ "status" => 1, "id" => 47, "title" => "Support"],
               5 => [ "status" => 1, "id" => 48, "title" => "Setting"],
               4 => [ "status" => 1, "id" => 49, "title" => "Messenger Groups"],

            ]
        ];
        $array[] = [
            "status" => 1,
            "title" => "Magenger Group",
            "permission" => [
               [ "status" => 1, "id" => 49, "title" => "Read"],
               [ "status" => 1, "id" => 50, "title" => "Create"],
               [ "status" => 1, "id" => 51, "title" => "Update"],
               [ "status" => 1, "id" => 52, "title" => "Delete"],
               [ "status" => 1, "id" => 53, "title" => "Add/Remove"]
            ]
        ];




        if($title !== ""){
            if(is_super()) return true;
            $permission_id = json_decode(role_has()->permission);
            foreach ($array as $parent){
               if($parent["title"] == $title){
                   if(!$parent["status"]) return false;
                   foreach ($parent["permission"] as $child){
                       if(!$child["status"]) continue;
                       if(trim($child["title"]) == trim($pertitle) && in_array($child["id"],$permission_id))
                       return true;
                   }
                }
            }
        }
        else
        return $array;
    }
}
