<div class="form-group {{ $errors->has('fname') ? 'has-error' : ''}}">
    <label for="fname" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="fname" type="text" id="fname" value="{{ isset($employee->fname) ? $employee->fname : ''}}" required>
    {!! $errors->first('fname', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('lname') ? 'has-error' : ''}}">
    <label for="lname" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="lname" type="text" id="lname" value="{{ isset($employee->lname) ? $employee->lname : ''}}" required>
    {!! $errors->first('lname', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    <label for="department_id" class="control-label">{{ 'Department' }}</label>
    <select name="department_id" id="department_id" class="select form-control">
        @foreach (Hr::findAll('departments') as $item)
            <option value="{{$item->id}}" {{ (Hr::isAdmin()) ? 'disable' : ''}}
                @if(isset($employee->department_id))
                    @if($employee->department_id == $item->id)  selected @endif
                @endif>
                {{$item->department}}</option>
        @endforeach
        {{-- @foreach (Hr::findAll('departments') as $item)
            <option value="{{$item->id}}">{{$item->department}}</option>
        @endforeach --}}
    </select>
    {{-- <input class="form-control" name="department_id" type="number" id="department_id" value="{{ isset($employee->department_id) ? $employee->department_id : ''}}" required> --}}
    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position_id') ? 'has-error' : ''}}">
    <label for="position_id" class="control-label">{{ 'Position' }}</label>
    <select name="position_id" id="position_id" class="select form-control">
        @foreach (Hr::findAll('positions') as $item)
            <option value="{{$item->id}}" {{ (Hr::isAdmin()) ? 'disable' : ''}}
                @if(isset($employee->position_id))
                    @if($employee->position_id == $item->id)  selected @endif
                @endif>
                {{$item->position}}</option>
        @endforeach
        {{-- @foreach (Hr::findAll('positions') as $item)
            <option value="{{$item->id}}">{{$item->position}}</option>
        @endforeach --}}
    </select>
    {{-- <input class="form-control" name="position_id" type="number" id="position_id" value="{{ isset($employee->position_id) ? $employee->position_id : ''}}" required> --}}
    {!! $errors->first('position_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="control-label">{{ 'Start Date' }}</label>
    <input class="form-control" name="start_date" type="date" id="start_date" value="{{ isset($employee->start_date) ? $employee->start_date : ''}}" required>
    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    <label for="end_date" class="control-label">{{ 'End Date' }}</label>
    <input class="form-control" name="end_date" type="date" id="end_date" value="{{ isset($employee->end_date) ? $employee->end_date : ''}}" >
    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    <label for="salary" class="control-label">{{ 'Salary' }}</label>
    <input class="form-control" name="salary" type="salary" id="salary" value="{{ isset($employee->salary) ? $employee->salary : ''}}" required>
    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
