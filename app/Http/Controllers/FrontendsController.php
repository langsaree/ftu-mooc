<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use App\Course;
use App\Faculty;
use App\Section;
use Auth;
use App\Lecture;
class FrontendsController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('content',compact('courses'));
    }

    //signin
    public  function signin(){
        return view('auth.login');
    }

    //signup
    public  function signup(){
        return view('auth.signup');
    }

    public function contact(){
        return view('contact');
    }

    public function profile(){
        return view('profile');
    }

    public function cview($id){


        $sections = Section::where('course_id',$id)->get();

        $course = Course::where('id',$id)->first();

        return view('frontend.course.cview',compact('course','sections'));
    }

    public function getfaculty($id){

        $fac = Faculty::where('id',$id)->first();

        $course = Course::where('faculty_id',$fac->id)->get();
        return view('frontend.course.getfaculty',compact('course','fac'));
    }

    //ลงทะเบียนผู้สอน
    public function InstructorRegister(){
        return view('admin.signin');
    }

    public function RegisterCourse(Request $r)
    {
        $register = Register::where('course_id',$r->course_id)->where('user_id',$r->user_id)->get();

        if($register->count() == 1){
            return response()->json(['success' => 2]);
        }else{
            $reg = new Register();
            $reg->user_id = $r->user_id ;
            $reg->course_id = $r->course_id ;
            $reg->reg_status = 1 ;

            $reg->save();
            return response()->json(['success' => 1]);
        }
    }
}
