<?php


Route::get('/','FrontendsController@index');
Route::get('/contact','FrontendsController@contact');


Route::get('/signin','FrontendsController@signin');
Route::get('/signup','FrontendsController@signup');

Route::get('course-view/{id}','FrontendsController@cview');
Route::get('about/{id}','FrontendsController@about');
Route::get('get-faculties/{id}','FrontendsController@getfaculty');

Route::get('posttest','FrontendsController@posttest');
//บันทึกการลงทะเบียน

//Product
Route::resource('/students','StudentsController');

//Register for teachers
Route::get('instructor-register','FrontendsController@InstructorRegister');
//Teacher registration Save
Route::resource('/instructors','InstructorsController');


// Login
Auth::routes();

//ลงทะเบียนเรียนตามหลักสูตรที่เลือก Enroll in the chosen course
Route::post('RegisterCourse','FrontendsController@RegisterCourse');

Route::get('myadmin','MyAdminsController@index');

Route::get('status0/{id}','MyAdminsController@status0');
Route::get('status1/{id}','MyAdminsController@status1');

Route::get('Mycourse','StudentsController@index');

Route::get('/home', 'FrontendsController@index')->name('home');

//instructor/Dashboard

Route::resource('/instructors','InstructorsController');
Route::get('instructor-dashboard','InstructorsController@index');
Route::get('instructor-ViewCourseAll','InstructorsController@ViewCourseAll');
Route::post('insert-course','InstructorsController@insertCourse');

//view
Route::get('viewcourse/{id}','InstructorsController@viewcourse');

//upload pic course
Route::patch('InstructorUploadPic/{id}','InstructorsController@InstructorUploadPic');
Route::post('InstructorUpdateAbout','InstructorsController@InstructorUpdateAbout');
Route::post('InstructorUpdateInformation','InstructorsController@InstructorUpdateInformation');
Route::post('InstructorUpdateGroupInformation','InstructorsController@InstructorUpdateGroupInformation');
Route::post('InstructorUpdateCourseQuiz','InstructorsController@InstructorUpdateCourseQuiz');
Route::post('InstructorUpdateDescription','InstructorsController@InstructorUpdateDescription');

//insert section
Route::post('InsertSection','InstructorsController@InsertSection');
Route::get('addlecture/{id}','InstructorsController@addlecture');

//save

Route::post('saveLecture','InstructorsController@saveLecture');
//update section & edit section
Route::get('EditSection/{id}','InstructorsController@EditSection');
Route::post('InsertUpdateSection','InstructorsController@InsertUpdateSection');
Route::post('DeleteSection','InstructorsController@DeleteSection');
Route::post('DeleteLecture','InstructorsController@DeleteLecture');

//Delete Course
Route::post('DeleteCourse','InstructorsController@DeleteCourse');

Route::post('PublicCheck','InstructorsController@PublicCheck');

//UploadContentPdf
Route::get('UploadContentPdf/{lecture_id}/{course_id}','InstructorsController@UploadContentPdf');
Route::post('UploadContentPdfFile','InstructorsController@UploadContentPdfFile');

//Upload PPT
Route::get('UploadContentPPT/{lecture_id}/{course_id}','InstructorsController@UploadContentPPT');
Route::post('UploadContentPPTFile','InstructorsController@UploadContentPPTFile');

//UploadContent MP4
Route::get('UploadContentMP4/{lecture_id}/{course_id}','InstructorsController@UploadContentMP4');
Route::post('UploadContentMP4File','InstructorsController@UploadContentMP4File');

//UploadContent Youtube
Route::get('UploadContentYoutube/{lecture_id}/{course_id}','InstructorsController@UploadContentYoutube');
Route::post('UploadContentYoutubeFile','InstructorsController@UploadContentYoutubeFile');

//UploadContent Article
Route::get('UploadContentArticle/{lecture_id}/{course_id}','InstructorsController@UploadContentArticle');
Route::post('UploadContentArticleFile','InstructorsController@UploadContentArticleFile');

//Pretest
Route::get('Pretest','InstructorsController@Pretest');
Route::get('AddPretest','InstructorsController@AddPretest');
Route::get('Choices','InstructorsController@Choices');
//Posttest

Route::get('Posttest','InstructorsController@Posttest');

//Results Exam

Route::get('Results','InstructorsController@Results');



//test adminlte tempalte render
Route::get('adminlte', function () {
    return view('adminlte');
});

Route::get('study', function () {
    return view('study');
});
Route::get('menu', function () {
    return view('menu');
});

Route::get('profile', function () {
    return view('instructor-profile');
});

Route::get('profile','FrontendsController@profile');



// Google login
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback','Auth\LoginController@handleProviderCallback');

// Facebook login
//Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
//Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Github login
//Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
//Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

Route::post('ckeditor/upload','InstructorsController@upload')->name('ckeditor.upload');







