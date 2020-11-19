<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;
use App\User;

class MyAdminsController extends Controller
{
    public function index(){
        $users = User::all();
//        return view('admin.UserAll',compact('users'));

        return view('admin.UserAll-refactoring',compact('users'));
    }

    public function courseAll(){
        $courses = Register::where('user_id',Auth::id())->get();
        return view('student.Mycourse',compact('courses'));
    }

    public function status0($id){
        $user = User::findOrFail($id);
        $user->status = 0 ;
        $user->save();
        return back();
    }

    public function status1($id){
        $user = User::findOrFail($id);
        $user->status = 1 ;
        $user->save();
        return back();


    }
}
