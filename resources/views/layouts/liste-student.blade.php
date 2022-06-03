<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($student as $student)
            <div class="card col m-b-2" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{$student->firstname}}</h5>
                <h5 class="card-title">{{$student->lastname}}</h5>
                <h5 class="card-title">{{$student->birthday}}</h5>
                <p class="card-text">{{$student->branch_id}}</p>
                <a href="{{route('student.show',[$student])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>

        @endforeach
    </div>
</div>


{!!$eventSportifs->links()!!}