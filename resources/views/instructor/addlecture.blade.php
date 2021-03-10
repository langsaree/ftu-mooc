@csrf
{{--<div class="modal-header">
    <h4 class="modal-title">{{ $section->section_name }} : id : {{ $section->id }}</h4>
</div>
<div class="modal-body">
    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
    <p class="">Add content</p>
    <div class="input-group">
        <input type="text" class="form-control" name="lecture_title" id="lecture_title" placeholder="เพิ่มหัวข้อเนื้อหาในบทเรียน"
               maxlength="79" onkeyup="count_title_lecture()">
        <span class="input-group-addon last"><span id="tecture">80</span></span>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-sm btn-primary" onclick="SaveLecture()">Save changes</button>
    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close the window</button>
</div>--}}

<!-- Modal -->
<div class="modal fade" id="Addcontent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $section->section_name }} : id : {{ $section->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">


                    <div class="row mt-4">
                        <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                        <label for="basic-url">Add content</label>
                        <div class="input-group">

                            <input type="text" class="form-control"  name="lecture_title"  id="lecture_title" placeholder="Enter a Title.." maxlength="70"
                                   onkeyup="count_title_lecture()">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                    <button type="button" class="btn btn-primary" onclick="SaveLecture()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
