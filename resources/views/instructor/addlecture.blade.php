@csrf
<div class="modal-header">
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
</div>
