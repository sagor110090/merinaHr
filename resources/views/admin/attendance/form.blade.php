<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    <select name="employee_id" id="employee_id" class="select form-control">
        @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}" {{ (Hr::isAdmin()) ? 'disable' : ''}}
                @if(isset($attendance->employee_id))
                    @if($attendance->employee_id == $item->id)  selected @endif
                @endif>
                {{$item->fname.' '.$item->lname}}
            </option>
        @endforeach
    </select>
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('attendance') ? 'has-error' : ''}}">
    <label for="attendance" class="control-label">{{ 'Attendance' }}</label>
    <input class="form-control" name="attendance" type="time" id="attendance" value="{{ isset($attendance->attendance) ? $attendance->attendance : ''}}" required>
    {!! $errors->first('attendance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('late') ? 'has-error' : ''}}">
    <label for="late" class="control-label">{{ 'Late' }}</label>
    <input class="form-control" name="late" type="text" id="late" value="{{ isset($attendance->late) ? $attendance->late : ''}}" >
    {!! $errors->first('late', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($attendance->date) ? $attendance->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>



