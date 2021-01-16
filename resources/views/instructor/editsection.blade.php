<div class="modal-header">
    <h4 class="modal-title">Edit => {{ $section->section_name }}</h4>
</div>
<div class="modal-body">
    <input type="hidden" name="section_id1" id="section_id1" value="{{ $section->id }}">
    <div class="row">
        <div class="col-sm-10">
            <p class="">Lesson topic</p>
            <div class="input-group">
                <input type="text" class="form-control" name="section_name1" id="section_name1" placeholder="Enter a Title.." maxlength="100" value="{{ $section->section_name }}" onkeyup="count_name1()">

                <span class="input-group-addon last"><span id="dd1">100</span></span>

            </div>
        </div>
    </div>
    <div class="row m-t-25">

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-sm btn-primary" onclick="InsertUpdateSection()">Save changes</button>
    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">close2021</button>
</div>
