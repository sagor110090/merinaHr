@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Monthly Report List</h4>
                </div>
            </div>
            <form action="{{ url('admin/report/previous/monthly') }}" method="get" class="search-wrapper cf">
                <input type="text" placeholder="Search here..."  name="search" class="form-control datepicker" autocomplete="off"  required="">
                <button type="submit">Search</button>
            </form>
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight"> <label for="date">Date</label><input type="text" id="date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                </div>
            </div>
            
            {{-- {{ $monthlyReports->first()->date ?? '' }} --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width='30'>#</th>
                        <th> Name </th>
                        <th> Late </th>
                        {{-- <th> Worling Day </th> --}}
                        <th> Leave </th>
                        <th> Absence </th>
                        <th> Fine </th>
                        <th> Salary </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedule as $item)
                    @php
                    // echo Hr::companyHolidays();
                    // dd(Hr::minutes(date('G:i:s', strtotime($item->end_time) - strtotime($item->start_time))));
                    $employee_id = $item->employee->fname.' '.$item->employee->lname;
                    $late = round($item->employee->attendance->whereBetween('date', [date('Y-m-01'), date('Y-m-31')])->sum('late'));
                    $dalySalary = (float)$item->employee->salary/(float)(Hr::countWorkingDayInMonth([Hr::companyHolidays()])*(Hr::minutes(date('G:i:s', strtotime($item->end_time) - strtotime($item->start_time)))));
                    $schedule = Hr::minutes(date('G:i:s', strtotime($item->end_time) - strtotime($item->start_time)));
                    $salary = round((float)$item->employee->salary - $late*$dalySalary - $schedule*(Hr::totalAbsence($item->employee->id)) * $dalySalary);
                    // Hr::companyBreakHour()
                    // date('G:i', strtotime($item->schedule->end_time) - strtotime($item->schedule->start_time))
                    echo $schedule*(Hr::totalAbsence($item->employee->id)) * $dalySalary;
                    @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$employee_id}}</td>
                        <td>{{ $late }}</td>
                        <td>{{ (Hr::totalLeave($item->employee->id)) }}</td>
                        <td>{{ (Hr::totalAbsence($item->employee->id)) }}</td>
                        <td>{{ $item->employee->salary - $salary }}</td>
                        <td>{{ $salary }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
</div>

@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('datepicker/css/datepicker.css') }}">

    
@endpush
@push('js')
    <script src="{{ asset('datepicker/js') }}/bootstrap-datepicker.js"></script>
    <script>
       $(".datepicker").datepicker( {
            format: "yyyy-mm",
            viewMode: "months", 
            endDate: '+0m',
            minViewMode: "months"
            
        });
    </script>

@endpush