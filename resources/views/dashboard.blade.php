@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            
            <div class="row">
                <div class="col">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="fa fa-user "></i></h1>
                            {{-- <h6 class="text-white">Total Employee</h6> --}}
                            <h5 class="m-b-0 m-t-5 text-white">{{Hr::coutTableRow('employees')}}</h5>
                            <small class="font-light text-white">Total Employee</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                            <h6 class="text-white">Attendance</h6>
                            <h5 class="m-b-0 m-t-5 text-white">{{Hr::coutTableRowDaly('attendances')->count()}}</h5>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                            <h6 class="text-white">Expense</h6>
                            <h5 class="m-b-0 m-t-5 text-white">{{Hr::coutTableRowDaly('expenses')->sum('amount')}}</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body" style="min-width:200px">
            
            <div class="row">
                <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                <div id='calendar'></div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection

@push('css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<style>
    .clock {
    /* position: absolute; */
    /* top: 50%; */
    left: 50%;
    /* transform: translateX(80%) translateY(0%); */
    color: #17D4FE;
    font-size: 30px;
    /* font-family: Orbitron;
    letter-spacing: 7px; */
   


}
</style>
@endpush

@push('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}
showTime();
</script>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events : [
                @foreach(App\Holiday::all() as $holiday)
                {
                    title : '{{ $holiday->name }}',
                    start : '{{ $holiday->holiday_date }}',
                    url : '{{ route('holiday.edit', $holiday->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endpush