<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use App\Instructor;
use App\User;
use App\Course;
use Auth;
use App\Section;
use File;
use Image;
use Session;
use Response;
use App\Group;
use App\Faculty;
use App\Lecture;
use App\Student;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countStudent = Register::where('user_id',Auth::id())->count();
        $countCourse = Course::where('user_id',Auth::id())->count();
        $countLecture = Lecture::where('user_id',Auth::id())->count();

        $courses = Course::where('user_id',Auth::id())->get();
        return view('instructor.dashboard-refactoring',compact(
            'courses',
            'countStudent',
            'countCourse',
            'countLecture'
        ));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->instructor_name;
        $user->email = $request->instructor_email;
        $user->password = bcrypt($request->instructor_password);
        $user->role_id = 2; // ผู้สอน

        $user->save();

        $lastUser = User::latest()->first();


        $ins = new Instructor();
        $ins->user_id = $lastUser->id;
        $ins->instructor_name = $request->instructor_name;
        $ins->instructor_username = $request->instructor_username;
        $ins->instructor_password = $request->instructor_password;
        $ins->instructor_citicenid = $request->instructor_citicenid;
        $ins->instructor_email = $request->instructor_email;
        $ins->instructor_phone = $request->instructor_phone;
        $ins->instructor_birthday = $request->instructor_birthday;
        $ins->instructor_edu = $request->instructor_edu;
        $ins->instructor_detail = $request->instructor_detail;

        $ins->save();

        return redirect()->route('login');





    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //ViewCourseAll

    public function ViewCourseAll()
    {
        $courses = Course::where('user_id', Auth::id())->get();
        return view('instructor.view-course-all-refactoring', compact('courses'));
    }

    public function viewcourse($code)
    {

        $sections = Section::where('course_id', $code)->get();
        $groups = Group::all();
        $faculties = Faculty::all();
        //หลักสูตร
        $course = Course::where('user_id', Auth::id())->where('id', $code)->first();
        //รายชื่อนักเรียนที่ลงทะเบียน
        $students = Register::where('course_id',$code)->get();

        return view('instructor.viewcoursebyID-refactoring', compact(
            'course',
            'groups',
            'faculties',
            'sections',
            'students'
        ));
    }

    public function insertCourse(Request $request)
    {

       // dd($request->all());
        $course = new Course();
        $course->course_code = NULL;
        $course->course_name = $request->course_name;
        $course->course_about = $request->course_about;
        $course->course_languages = $request->course_languages;
        $course->faculty_id = $request->faculty_id;
        $course->group_id = $request->group_id;
        $course->course_pretest = $request->course_pretest;
        $course->course_posttest = $request->course_posttest;
        $course->course_start = $request->course_start;
        $course->course_end = $request->course_end;
        $course->user_id = Auth::id();
        $course->save();

        $last = Course::latest()->first();

        $section = new Section();

        $section->section_name = 'Start Here';
        $section->section_number = 1;
        $section->course_id = $last->id;
        $section->user_id = $last->user_id;
        $section->section_date = $last->course_start;
        $section->save();

        return redirect('instructor-ViewCourseAll');


    }

    public function GetProgram()
    {
        $id = $this->input->post('id');
        $r = $this->db->where('program_faculty', $id)->get('programs')->result_array();
        echo "<select class='form-control' name='course_programs' id='course_programs' required='required'>";
        echo "<option value=''>กรุณาเลือกกลุ่มวิชา</option>";
        foreach ($r as $key) {
            echo "<option value='" . $key['program_id'] . "'>" . $key['program_name'] . "(" . $key['program_nameen'] . ")</option>";
        }
        echo "</select>";
    }

    public function InstructorUploadPic(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        //upload image
        if ($request->hasFile('pic')) {
            //delete file
            if ($course->course_pic != NULL) {
                File::delete(public_path('upload/img' . $course->course_pic));

            }

            $newfilename = str_random(10) . '.' .
                $request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(public_path() . '/upload/img/', $newfilename);
            //resize image
//
            $course->course_pic = $newfilename;
        } else {
            $course->course_pic = $course->course_pic; //ชื่อเดิม
        }

        $course->save();


        // Session::flash('success','อัฟโหลดภาพเรียบร้อยแล้ว');
        return redirect('viewcourse/' . $id);

    }

    public function InstructorUpdateAbout(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->course_about = $request->course_about;
        $course->save();

        return response()->json(['success' => 'แก้ไขรายการสำเร็จ']);

        // echo "1";

    }

    public function InstructorUpdateInformation(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->course_name = $request->course_name;
        $course->course_languages = $request->course_languages;
        $course->course_start = $request->course_start;
        $course->course_end = $request->course_end;
        $course->course_price = $request->course_price;
        $course->save();

        return response()->json(['success' => 'แก้ไขรายการสำเร็จ']);

    }

    public function InstructorUpdateGroupInformation(Request $r)
    {
        $c = Course::findOrFail($r->id);
        $c->faculty_id = $r->faculty_id;
        $c->group_id = $r->group_id;
        $c->save();

        return response()->json(['success' => 'แก้ไขรายการสำเร็จ']);
    }

    public function InstructorUpdateCourseQuiz(Request $r)
    {
        $c = Course::findOrFail($r->id);
        $c->course_pretest = $r->pretest;
        $c->course_posttest = $r->posttest;
        $c->save();

        return response()->json(['success' => 'แก้ไขรายการสำเร็จ']);
    }

    public function InstructorUpdateDescription(Request $r)
    {
        $c = Course::findOrFail($r->id);
        $c->course_description = $r->course_description;
        $c->save();

        return response()->json(['success' => 'แก้ไขรายการสำเร็จ']);
    }

    // Add New Section

    public function InsertSection(Request $r)
    {
        $section = new Section();
        $section->course_id = $r->course_id;
        $section->section_name = $r->section_name;
        $section->section_title = $r->section_title;
        $section->section_number = $r->section_number;
        $section->user_id = Auth::id();
        $section->section_date = date('Y-m-d');

        $section->save();
        return response()->json(['success' => 'เพิ่ม Section ใหม่เรียบร้อย']);


    }

    public function addlecture($id)
    {
        $section = Section::where('id', $id)->first();
        return view('instructor.addlecture', compact('section'));
    }

    //save lecture
    public function saveLecture(Request $r)
    {
        $lecture = new Lecture();
        $lecture->lecture_name = $r->lecture_title;
        $lecture->section_id = $r->section_id;
        $lecture->lecture_preview = 0;
        $lecture->user_id = Auth::id();
        $lecture->save();

        return response()->json(['success' => 'บันทึกรายการเรียบร้อยแล้ว']);

    }

    //edit lecture

    public function EditSection($id)
    {
        $section = Section::where('id', $id)->first();
        return view('instructor.editsection', compact('section'));
    }

    public function InsertUpdateSection(Request $r)
    {
        $lecture = Section::findOrFail($r->id);
        $lecture->section_name = $r->section_name;
        $lecture->section_title = $r->section_title;

        $lecture->save();

        return response()->json(['success' => 'แก้ไขรายการเรียบร้อยแล้ว']);
    }

    public function DeleteSection(Request $r)
    {

        $section = Section::findOrFail($r->id);
        $section->delete();

    }

    public function DeleteLecture(Request $r)
    {
        $lecture = Lecture::findOrFail($r->id);
        $lecture->delete();
    }

    //PublicCheck
    public function PublicCheck(Request $r)
    {
        $lecture = Lecture::where('id', $r->id)->first();

        if ($lecture->lecture_preview == 1) {
            $update = Lecture::findOrFail($r->id);
            $update->lecture_preview = 0;
            $update->save();
        } else {
            $update = Lecture::findOrFail($r->id);
            $update->lecture_preview = 1;
            $update->save();
        }
    }

    //UploadContentPdf
    public function UploadContentPdf($lecture_id, $course_id)
    {
        return view('instructor.create-pdf', [
            'lecture_id' => $lecture_id,
            'course_id' => $course_id
        ]);
    }

    //UploadContentPPT
    public function UploadContentPPT($lecture_id, $course_id)
    {
        return view('instructor.create-ppt', [
            'lecture_id' => $lecture_id,
            'course_id' => $course_id
        ]);
    }

    //UploadContentMP4
    public function UploadContentMP4($lecture_id, $course_id)
    {
        return view('instructor.create-mp4', [
            'lecture_id' => $lecture_id,
            'course_id' => $course_id
        ]);
    }

    //UploadContentYoutube
    public function UploadContentYoutube($lecture_id, $course_id)
    {
        return view('instructor.create-youtube', [
            'lecture_id' => $lecture_id,
            'course_id' => $course_id
        ]);
    }

    //UploadContentArticle
    public function UploadContentArticle($lecture_id, $course_id)
    {
        return view('instructor.create-article', [
            'lecture_id' => $lecture_id,
            'course_id' => $course_id
        ]);
    }


    public function UploadContentPdfFile(Request $request)
    {

        $lecture = Lecture::findOrFail($request->lecture_id);
        //upload
        if ($request->hasFile('pdf')) {

            $newfilename = str_random(10) . '.' .
                $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move(public_path() . '/upload/content/', $newfilename);

            $lecture->pdf = $newfilename;
        } else {
            $lecture->pdf = $lecture->pdf; //ชื่อเดิม
        }

        $lecture->save();
        return redirect('viewcourse/' . $request->course_id);
    }



    //PPT
    public function UploadContentPPTFile(Request $request)
    {

        $lecture = Lecture::findOrFail($request->lecture_id);
        //upload
        if ($request->hasFile('ppt')) {

            $newfilename = str_random(10) . '.' .
                $request->file('ppt')->getClientOriginalExtension();
            $request->file('ppt')->move(public_path() . '/upload/content/', $newfilename);

            $lecture->ppt = $newfilename;
        } else {
            $lecture->ppt = $lecture->ppt; //ชื่อเดิม
        }

        $lecture->save();
        return redirect('viewcourse/' . $request->course_id);
    }

    //MP4
    public function UploadContentMP4File(Request $request)
    {

        $lecture = Lecture::findOrFail($request->lecture_id);
        //upload
        if ($request->hasFile('mp4')) {

            $newfilename = str_random(10) . '.' .
                $request->file('mp4')->getClientOriginalExtension();
            $request->file('mp4')->move(public_path() . '/upload/content/', $newfilename);

            $lecture->mp4 = $newfilename;
        } else {
            $lecture->mp4 = $lecture->mp4; //ชื่อเดิม
        }

        $lecture->save();
        return redirect('viewcourse/' . $request->course_id);
    }

    //YOutube
    public function UploadContentYoutubeFile(Request $request)
    {

        $lecture = Lecture::findOrFail($request->lecture_id);
        $lecture->youtube = $request->youtube;

        $lecture->save();
        return redirect('viewcourse/' . $request->course_id);
    }

    // Article

    public function UploadContentArticleFile(Request $request)
    {

        $lecture = Lecture::findOrFail($request->lecture_id);
        $lecture->lecture_article = $request->article;

        $lecture->save();
        return redirect('viewcourse/' . $request->course_id);
    }



    // Delete Course
    public function DeleteCourse(Request $r)
    {
        $section = Course::findOrFail($r->id);
        $section->delete();

        Alert::success('Success Title', 'Success Message');


        /* return redirect('instructor-ViewCourseAll')->with('success','data deleted');*/

    }

    //pretest
    public function Pretest(){
        $course = Course::where('user_id',Auth::id())->where('course_pretest',1)->get();
        return view('instructor.pretest-refactoring',compact('course'));
    }

    //posttest
    public function Posttest(){
        $course = Course::where('user_id',Auth::id())->where('course_posttest',1)->get();
        return view('instructor.posttest-refactoring',compact('course'));
    }

    public function AddPretest(){

        return view('instructor.add-pretest');
    }

    public function Choices(){

        return view('instructor.choices');
    }

    public function Results(){

        return view('instructor.results');
    }

    public function upload (Request $request)
    {

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";

            @header('content-type: text/html; charset=utf-8');
            echo $response;
        }

    }

}
