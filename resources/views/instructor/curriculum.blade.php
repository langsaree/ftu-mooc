<div class="col-sm-10 col-sm-offset-1 m-b-25 m-t-25">
    <div class="panel-group" data-collapse-color="green" id="accordionGreen" role="tablist" aria-multiselectable="true">

        @php
            $i = 0;
        @endphp

        @foreach ($sections as $section)


            <div class="panel panel-collapse">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordionGreen" href="#{{ $section->id }}"
                           aria-expanded="false" class="collapsed">
                            {{ $section->section_name }}
                        </a>
                    </h4>
                </div>

                <div id="{{ $section->id }}" class="collapse" role="tabpanel" aria-expanded="false"
                     style="height: 0px;">

                    <div class="panel-body">

                        <div class="col-sm-12 m-t-5 m-b-20">
                            <button class="btn btn-primary btn bg-lightblue"
                                    onclick="addlecture('{{ $section->id }}')"><i
                                        class="zmdi zmdi-collection-plus zmdi-hc-fw"></i> Add content
                            </button>
                            <button class="btn btn-primary btn bg-amber"
                                    onclick="EditSection({{ $section->id }})"><i
                                        class="zmdi zmdi-comment-edit zmdi-hc-fw"></i> Edit lesson
                            </button>
                            <button class="btn btn-primary btn bg-pink" onclick="DeleteSection({{ $section->id }})"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Delete lesson


                            </button>
                        </div>


                        <div class="c-gray m-l-5">
                            {{ $section->section_title }}
                        </div>

                        @php
                            //loop lecture
                            $lectures =  DB::table('lectures')->where('section_id',$section->id)->get();

                        @endphp
                        <div class="col-sm-12 m-t-5 m-b-20">

                            @foreach ($lectures as $lecture)


                                <div class="col-sm-12 m-t-20 m-b-20">
                                    <div class="tile">
                                        <div class="t-header th-alt bg-gray">
                                            <div class="th-title">
                                                {{ $lecture->lecture_name }}

                                                &nbsp;&nbsp;
                                                <span class="text-danger">

                                                    <div class="toggle-switch">
                                                        <label for="ts1" class="ts-label">Open to public </label>

                                                        <input id="{{ $lecture->id }}"
                                                               type="checkbox"
                                                               @if ($lecture->lecture_preview == '1')  checked
                                                               @endif
                                                               onclick="PublicCheck('{{ $lecture->id }}#{{ $lecture->lecture_preview }}')">

                                                        <label for="ts1" class="ts-helper"></label>

                                                    </div>
                                                </span>
                                            </div>

                                            <div class="actions dropdown">
                                                <a href="" data-toggle="dropdown" aria-expanded="false"><i
                                                            class="zmdi zmdi-more"></i></a>

                                                <ul class="dropdown-menu pull-right">

                                                    <li><a href="javascript:void(0)"
                                                           onclick="DeleteLecture('{{ $lecture->id }}')">delete</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>



                                        <div class="t-body tb-padding">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div role="tabpanel" class="tab">
                                                        <ul class="tab-nav" role="tablist">

                                                            {{--<li role="presentation" class=""><a--}}
                                                                        {{--href="#ppt{{ $lecture->id }}"--}}
                                                                        {{--aria-controls="ppt{{ $lecture->id }}"--}}
                                                                        {{--role="tab" data-toggle="tab"--}}
                                                                        {{--aria-expanded="false">Power--}}
                                                                    {{--Point</a></li>--}}

                                                            <li role="presentation" class=""><a
                                                                        href="#youtube{{ $lecture->id }}"
                                                                        aria-controls="youtube{{ $lecture->id }}"
                                                                        role="tab" data-toggle="tab"
                                                                        aria-expanded="false">youtube</a>
                                                            </li>

                                                            <li role="presentation" class=""><a
                                                                        href="#article{{ $lecture->id }}"
                                                                        aria-controls="article{{ $lecture->id }}"
                                                                        role="tab" data-toggle="tab"
                                                                        aria-expanded="false">article</a>
                                                            </li>
                                                        </ul>

                                                        <div class="row">

                                                        </div>

                                                        <div class="tab-content">

                                                            <div role="tabpanel" class="tab-pane animated fadeIn"
                                                                 id="youtube{{ $lecture->id }}">
                                                                @if($lecture->youtube)
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

                                                            <div role="tabpanel" class="tab-pane animated fadeIn"
                                                                 id="article{{ $lecture->id }}">
                                                                @if($lecture->lecture_article)
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
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


<div class="col-sm-12">

    <div class="col-sm-12 col-sm-offset-0 m-b-25 m-t-30">
        <div class="panel-group" data-collapse-color="green" id="accordionGreen" role="tablist"
             aria-multiselectable="true">

            <div class="panel panel-collapse">
                <div class="panel-heading" role="tab">
                    <h2 class="panel-title">


                        <a data-toggle="collapse" data-parent="#accordionGreen" href="#add_section"
                           aria-expanded="false" class="collapsed">
                            <i class="zmdi zmdi-file-plus zmdi-hc-fw"></i>Add a lesson

                        </a>

                    </h2>
                </div>

                <div id="add_section" class="collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">

                        <div class="tile bg-gray">
                            <div class="t-header th-alt">
                                <div class="th-title">Add a lesson</div>

                            </div>
                            <div class="t-body tb-padding">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p class="">Lesson topic</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="section_name"
                                                   id="section_name" placeholder="Enter a Title.." maxlength="100"
                                                   onkeyup="count_name()">

                                            <span class="input-group-addon last"><span id="dd">100</span></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 m-t-20">
                                        <button class="btn btn-primary btn-sm" onclick="InsertSection()">save
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
    </div>
</div>





