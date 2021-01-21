@extends('layouts.admin')

@section('content')
    <section id="content">
        <div class="container">
            <div class="tile col-lg-12">
                <div class="t-header">
                    <div class="th-title">Register<small>ระบบจัดการ FTUMOOC สำหรับผู้สอน</small></div>
                </div>

                <div class="t-body tb-padding">
                    <form role="form"  method="post" action="{{ route('instructors.store') }}" >
                    @csrf
                        <div class="row">
                            <div class="col-sm-4 m-b-20" id="instructor_name_g">
                                <label for="instructor_name">Name-Surname</label>
                                <input type="text" class="form-control" id="instructor_name" name="instructor_name" placeholder="ชื่อ-สกุล" required>
                            </div>
                            <div class="col-sm-4 m-b-20" id="instructor_username_g">
                                <label for="instructor_username">Email for login</label>
                                <input type="email" class="form-control" id="instructor_email" name="instructor_email" placeholder="e-mail" required>
                            </div>
                            <div class="col-sm-4 m-b-20" id="instructor_password_g">
                                <label for="instructor_password">Password</label>
                                <input type="password" class="form-control" id="instructor_password" name="instructor_password" placeholder="รหัสผ่าน" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 m-b-20" id="instructor_citicenid_g">
                                <label for="instructor_citicenid">ID card number</label>
                                <input type="text" class="form-control input-mask" data-mask="0000000000000" id="instructor_citicenid" name="instructor_citicenid" placeholder="เลขบัตรประจำตัวประชาชน" required>
                            </div>
                            <div class="col-sm-3 m-b-20" id="instructor_email_g">

                            </div>
                            <div class="col-sm-3 m-b-20" id="instructor_phone_g">
                                <label for="instructor_phone">Phone number</label>
                                <input type="text" class="form-control input-mask" data-mask="000-0000000" id="instructor_phone" name="instructor_phone" placeholder="000-0000000" required>
                            </div>
                            <div class="col-sm-3 " id="instructor_birthday_g">
                                <p class="c-black">Birthday</p>

                                <div class="input-group form-group ">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="dtp-container">
                                        <input type='text' class="form-control date-picker" name="instructor_birthday" id="instructor_birthday" placeholder="Click here...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 m-b-20">
                                <p class=" c-black ">Aptitude</p>

                                <textarea class="html-editor " id="instructor_skill" name="instructor_skill" value="">

                                </textarea>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-10 m-b-20">
                                <p class=" c-black ">Educational history</p>

                                <textarea class="html-editor " id="instructor_edu" name="instructor_edu" value="">

                                </textarea>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-10 m-b-20">
                                <p class=" c-black ">Personal information</p>

                                <textarea class="html-editor" id="instructor_detail" name="instructor_detail" value=""></textarea>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary btn-sm m-t-10">Register tutor</button>
                        <button type="reset" class="btn btn-danger btn-sm m-t-10">cancel</button>
                    </form>
                </div>
            </div>




        </div>
    </section>

    @stop
