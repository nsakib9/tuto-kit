<?php
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if(!function_exists('getOption')){
 	function getOption($i,$val = ''){
		$html = '';
 		$list = [
			 'eq' =>
			 ['HSC','Hon\'s','Master','BBA','MBA' ],
		];
		 if($val !== ''){
			foreach ($list[$i] as $clm){
				$select = $val == $clm ? 'selected' : '' ;
				$html .= '<option value="'.$clm.'" '.$select.'>'.$clm.'</option>';
			}
		 }
		 foreach ($list[$i] as $clm){
			 $html .= '<option value="'.$clm.'">'.$clm.'</option>';
		 }
		 return $html;
 	}
 }
//  ->where(function($w){
// 	$w->where('course',Auth::user()->course)
// 	->orWhere('expertIn',);
// });
 if(!function_exists('getRecords')){
	function getRecords($val){
		$data = [];
		foreach ($val as $clm){
			$arr = json_decode($clm->expertIn);
			$teacher = null;
			$student = null;
			if(is_student()){
				$teacher = in_array(Auth::user()->course, $arr??[000,000]);
				$student = $clm->course == Auth::user()->course;
			}
			if(is_teacher()){
				$arr = json_decode(Auth::user()->expertIn);
				$teacher = $clm->role_name == role_name();
				$student = in_array($clm->course, $arr??[000,000]);
			}
			if($teacher || $student){
				array_push($data,$clm);
			}
		}
		return (Object) $data ;
	}
}


if(!function_exists('getClass')){
	function getClass($val){
		$class = Course::find($val);
		if($class)
		return $class->title;
		else
		return (is_super() ? 'Admin' : (is_teacher() ? 'Teacher': Auth::user('name') ));
	}
}
if(!function_exists('getName')){
	function getName($id){
		return User::find($id)->name;
	}
}
if(!function_exists('menuActiveId')){
	function menuActiveId($main,$sub=0){
		session(['menuActiveId' => $main]);
		if($sub){
			session(['subActiveId' => $sub]);
		}
	}
}

if(!function_exists('menuactive')){
	function menuactive($id,$sub=''){
		$key = $sub == '' ?  'menuActiveId' : 'subActiveId' ;

		if(Session::has($key)){
			 if(Session::get($key) == $id){
			   Session::forget($key);
			   return 'active';
			 }
		}
		return '';
	}
}