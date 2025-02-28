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
                <input type="text" placeholder="Search here..." name="search" class="form-control datepicker"
                    autocomplete="off" required="">
                <button type="submit">Search</button>
            </form>
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight"> <label for="date">Date</label><input type="text" id="date"
                        class="form-control" value="{{ $_REQUEST['search'] }}" readonly>
                </div>
            </div>
            <button class="btn btn-warning btn-sm" id="print">Print</button>
            <br>
            <br>
            <br>
            {{-- {{ $monthlyReports->first()->date ?? '' }} --}}
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width='30'>#</th>
                        <th> Name </th>
                        <th> Late </th>
                        <th> Fine </th>
                        <th> Salary </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlyReports as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->employee_id}}</td>
                        <td>{{ $item->late }}</td>
                        <td>{{ $item->fine }}</td>
                        <td>{{ $item->salary }}</td>

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
<script src="{{ asset('js/printThis.js') }}">
</script>
<script src="{{ asset('datepicker/js') }}/bootstrap-datepicker.js"></script>
<script>
    $(".datepicker").datepicker({
        format: "yyyy-mm",
        viewMode: "months",
        endDate: '+0m',
        minViewMode: "months"
    });
</script>
<script>
    $('#print').click(function(e) {
        e.preventDefault();
        $('#table').printThis({
            // importCSS: false,
            header: "<center><h1>{{Hr::companyInfo()->name}}</h1>month: {{$_REQUEST['search']}}<br>Monthly Reports<br></center><br><br><br>"
        });
    });
</script>
@endpush

