<div class="col-sm-12 col-sm-offset-1 m-b-25 m-t-25">
    <div class="panel-group" data-collapse-color="green" id="accordionGreen" role="tablist" aria-multiselectable="true">
        @php
            $i = 0;
        @endphp
        @foreach ($sections as $section)

            <div class="card">
            <div class="card-header">
                <h3 class="card-title"><a data-toggle="collapse" data-parent="#accordionGreen" href="#{{ $section->id }}"
                                          aria-expanded="false" class="collapsed">
                        {{ $section->section_name }}
                    </a></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">

                                <div class="col-sm-12 m-t-5 m-b-20">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Addcontent">Add content</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" onclick="addlecture('{{ $section->id }}')" data-target="#Editlesson">Edit lesson</button>
                                <button type="button" class="btn btn-danger"  href="/DeleteSection/({{ $section->id }})" >Delete lesson</button>

                                <!-- Modal -->
                                <div class="modal fade" id="Addcontent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $section->section_name }} : id : {{ $section->id }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row mt-4">
                                                    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                                                    <label for="basic-url">Add content</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control"  name="lecture_title"  id="lecture_title" placeholder="Enter a Title.." maxlength="70"
                                                               onkeyup="count_title_lecture()">
                                                        <span class="input-group-text "><span id="dd">80</span></span>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                <button type="button" class="btn btn-primary" onclick="SaveLecture()">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="Editlesson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit => {{ $section->section_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mt-4">
                                                        <input type="hidden" name="section_id1" id="section_id1" value="{{ $section->id }}">
                                                        <label for="basic-url">Lesson topic</label>
                                                        <div class="input-group">

                                                            <input type="text" class="form-control" value="{{ $section->section_name }}" name="lecture_title"  id="lecture_title" placeholder="Enter a Title.." maxlength="100"
                                                                   onkeyup="count_name1()">
                                                            <span class="input-group-text "><span id="dd1">100</span></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="InsertUpdateSection()">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="c-gray m-l-5">
                                {{ $section->section_title }}
                            </div>

                            @php
                                //loop lecture
                                $lectures =  DB::table('lectures')->where('section_id',$section->id)->get();

                            @endphp

                            @foreach ($lectures as $lecture)


                                <div class="col-sm-12 m-t-20 m-b-20">
                            <div class="card" style="width: 40rem;">
                                <div class="card-header">
                                    {{ $lecture->lecture_name }}
                                    <span class="text-danger">
                                    <div class="custom-control custom-switch">


                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">

                                        <label class="custom-control-label" for="customSwitch1">Public</label>

                                    </div>
                                    </span>
                                    <div class="dropdown">
                                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                    <div class="row mt-4">
                                        <nav class="w-100">
                                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#youtube{{ $lecture->id }}" role="tab" aria-controls="youtube{{ $lecture->id }}" aria-selected="true">Youtube</a>
                                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#article{{ $lecture->id }}" role="tab" aria-controls="article{{ $lecture->id }}" aria-selected="false">Article</a>
                                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#ppt" role="tab" aria-controls="product-rating" aria-selected="false">PowerPoint</a>
</div>
</nav>
<div class="tab-content p-3" id="nav-tabContent">
<div class="tab-pane fade show active" id="youtube{{ $lecture->id }}" role="tabpanel" aria-labelledby="product-desc-tab"> @if($lecture->youtube)
        <div class="col-sm-12 m-b-20">
            <p>See content from Youtube <a
                    href="{{ $lecture->youtube }}"
                    target="_blank">{{ $lecture->lecture_name }}</a>
            </p>
        </div>
    @else
        <div class="row">
            <div class="col-xs-6 col-md-2">
                <a href="{{ url('UploadContentYoutube') }}/{{ $lecture->id }}/{{ $course->id }}"
                   class="thumbnail" data-toggle="tooltip"
                   data-placement="bottom" title=""
                   data-original-title="Youtube">
                    <img class="animated shake"
                         src="{{ asset('upload/icon/MetroUIYouTube.ico') }}"
                         alt="">
                </a>
            </div>
        </div>
    @endif
</div>

<div class="tab-pane fade" id="article{{ $lecture->id }}" role="tabpanel" aria-labelledby="product-comments-tab"> @if($lecture->lecture_article)
        <div class="col-sm-12 m-b-20">
            {!! $lecture->lecture_article !!}
        </div>
    @else
        <div class="row">
            <div class="col-xs-6 col-md-2">
                <a href="{{ url('UploadContentArticle') }}/{{ $lecture->id }}/{{ $course->id }}"
                   class="thumbnail" data-toggle="tooltip"
                   data-placement="bottom" title=""
                   data-original-title="Article">
                    <img class="animated bounceIn"
                         src="{{ asset('upload/icon/f63e58c7113ddbf4ae2ea993d7eccd11.jpg') }}"
                         alt="">
                </a>
            </div>
        </div>


    @endif
</div>

<div class="tab-pane fade" id="ppt" role="tabpanel" aria-labelledby="product-rating-tab"> ....</div>
</div>

   </div><!-- /.list Y-A-P -->
</div>
     @endforeach
</div>

</div>
</div>
</div>
</div>
@php
$i++;
@endphp
@endforeach
</div>
</div>
            <!-- /.card-body -->



<div class="col-sm-12">
<div class="col-sm-12 col-sm-offset-0 m-b-25 m-t-30">
<div class="col-sm-12 col-sm-offset-0 m-b-25 m-t-30">
<div class="panel-group" data-collapse-color="green" id="accordionGreen" role="tablist"
aria-multiselectable="true">
<p>
<a class="btn btn-success" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-plus" ></i>
Add a lesson
</a>

</p>
<div class="collapse" id="collapse">
<div class="card card-body">
Add a lesson
<div class="row mt-4">
<label for="basic-url">Lesson topic</label>
<div class="input-group">


<input type="text" class="form-control"  name="section_name"  id="section_name" placeholder="Enter a Title.." maxlength="100"
onkeyup="count_name()">
<span class="input-group-text "><span id="dd">100</span></span>

</div>
</div>

<div class="row mt-4">
<div class="col-sm-12 m-t-20">
<button class="btn btn-success btn-sm" onclick="InsertSection()">save
</button>
<button class="btn btn-link btn-sm collapsed" data-toggle="collapse"
data-parent="#accordionGreen" href="#add_section"
aria-expanded="false">cancel
</button>
</div>
</div>

</div>
</div>
</div>
</div>

</div>
</div>
