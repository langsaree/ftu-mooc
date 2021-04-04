
    <!-- slider -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>My course</h2>
            </div><!-- .page-title -->
        </div><!-- .col-md-12 -->
    </div>

    @foreach ($courses as $key)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('upload/img/'.$key->course_pic)  }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $key->course_name }}</h5>
            <p class="card-text">{{ $key->faculty_name }}</p>
            <small>begin: {{ $key->course_start }}
                To: {{ $key->course_end }}
            </small>
            <a href="{{ url('course-view',['id'=>$key->course_id]) }}" class="btn btn-primary">View</a>
        </div>
    </div><br>@endforeach











