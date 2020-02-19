<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    <select name="employee_id" id="employee_id" class="select form-control">
        @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}">{{$item->fname.' '.$item->lname}}</option>
        @endforeach
    </select>
    {{-- <input class="form-control" name="employee_id" type="number" id="employee_id" value="{{ isset($schedule->employee_id) ? $schedule->employee_id : ''}}" required> --}}
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
    <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
    <input class="form-control" name="start_time" type="time" id="start_time" value="{{ isset($schedule->start_time) ? $schedule->start_time : ''}}" required>
    {!! $errors->first('start_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
    <label for="end_time" class="control-label">{{ 'End Time' }}</label>
    <input class="form-control" name="end_time" type="time" id="end_time" value="{{ isset($schedule->end_time) ? $schedule->end_time : ''}}" required>
    {!! $errors->first('end_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('starting_date') ? 'has-error' : ''}}">
    <label for="starting_date" class="control-label">{{ 'Starting Date' }}</label>
    <input class="form-control" name="starting_date" type="date" id="starting_date" value="{{ isset($schedule->starting_date) ? $schedule->starting_date : ''}}" required>
    {!! $errors->first('starting_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ending_date') ? 'has-error' : ''}}">
    <label for="ending_date" class="control-label">{{ 'Ending Date' }}</label>
    <input class="form-control" name="ending_date" type="date" id="ending_date" value="{{ isset($schedule->ending_date) ? $schedule->ending_date : ''}}" >
    {!! $errors->first('ending_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('restDay') ? 'has-error' : ''}}">
    <label for="restDay" class="control-label">{{ 'Rest Day' }}</label>
    @php
        $days = isset($schedule->restDay) ? json_decode($schedule->restDay) : '';
    @endphp
    <select class="select-multiple form-control" name="restDay[]" multiple="multiple" value="{{ isset($schedule->restDay) ? $schedule->restDay : ''}}" required>
        <option  value='mon' {{ isset($schedule->restDay) ? in_array("mon", $days) ? 'selected' : '' : ''}} > Monday</option>
        <option {{ isset($schedule->restDay) ? in_array("tue", $days) ? 'selected' : '' : ''}} value='tue'>Tuesday</option>
        <option {{ isset($schedule->restDay) ? in_array("wed", $days) ? 'selected' : '' : ''}} value='wed'>Wednesday</option>
        <option {{ isset($schedule->restDay) ? in_array("thu", $days) ? 'selected' : '' : ''}} value='thu'>Thursday</option>
        <option {{ isset($schedule->restDay) ? in_array("fri", $days) ? 'selected' : '' : ''}} value='fri'>Friday</option>
        <option {{ isset($schedule->restDay) ? in_array("sat", $days) ? 'selected' : '' : ''}} value='sat'>Saturday</option>
        <option {{ isset($schedule->restDay) ? in_array("sun", $days) ? 'selected' : '' : ''}} value='sun'>Sunday</option>
    </select>
    {!! $errors->first('restDay', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
