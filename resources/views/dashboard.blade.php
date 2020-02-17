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
        <div class="card-body">
            
            <div class="row">
                <div id="MyClockDisplay" class="clock" onload="showTime()"></div>

                <div id='loading'>loading...</div>

                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('css')
<link href='{{ asset('/') }}calender/core/main.css' rel='stylesheet' />
<link href='{{ asset('/') }}calender/daygrid/main.css' rel='stylesheet' />
<link href='{{ asset('/') }}calender/list/main.css' rel='stylesheet' />
<script src='{{ asset('/') }}calender/core/main.js'></script>
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
<script src='{{ asset('/') }}calender/core/main.js'></script>
<script src='{{ asset('/') }}calender/interaction/main.js'></script>
<script src='{{ asset('/') }}calender/daygrid/main.js'></script>
<script src='{{ asset('/') }}calender/list/main.js'></script>
<script src='{{ asset('/') }}calender/google-calendar/main.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'list', 'googleCalendar'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listYear'
            },
            displayEventTime: false, // don't show the time column in list view
            // THIS KEY WON'T WORK IN PRODUCTION!!!
            // To make your own Google API key, follow the directions here:
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
            // US Holidays
            events: 'en.usa#holiday@group.v.calendar.google.com',
            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');
                arg.jsEvent.preventDefault() // don't navigate in main tab
            },
            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }
        });
        calendar.render();
    });
</script>
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
@endpush