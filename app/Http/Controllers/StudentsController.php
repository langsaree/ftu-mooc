<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Register;
use Auth;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $courses = Register::where('user_id',Auth::id())->get();
            return view('student.Mycourse',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->email = $request->username ;
        $users->password = bcrypt($request->password);
        $users->name = $request->nickname;
        $users->role_id = 3; //ผู้เรียน

        $users->save();

        $lastUser  = User::latest()->first();

        $students = new Student();
        $students->user_id = $lastUser->id;
        $students->student_email = $request->username;
        $students->student_password = bcrypt($request->password);
        $students->student_fullname = $request->fullname;
        $students->student_nickname = $request->nickname;
        $students->student_sex = $request->sex;
        //$students->student_year = $request->year;
        $students->student_edu = $request->edu;
        $students->student_address = $request->address ;
        $students->student_reason = $request->reason;
        $students->student_status = 0;

        $students->save();

        return redirect()->route('login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
