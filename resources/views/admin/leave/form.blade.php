
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($leave->date) ? $leave->date : ''}}" >
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee Name' }}</label>
    <select name="employee_id" id="employee_id" class="select form-control">
        @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}">{{$item->fname.' '.$item->lname}}</option>
        @endforeach
    </select>
    {{-- <input class="form-control" name="employee_id" type="number" id="employee_id" value="{{ isset($leave->employee_id) ? $leave->employee_id : ''}}" required> --}}
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('application') ? 'has-error' : ''}}">
    <label for="application" class="control-label">{{ 'Application' }}</label>
    <textarea name="application" id="application" cols="30" rows="10" class="form-control">{{ isset($leave->application) ? $leave->application : ''}}</textarea>
    {{-- <input class="form-control" name="application" type="text" id="application" value="" required> --}}
    {!! $errors->first('application', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <label for="file" class="control-label">{{ 'File' }}</label>
    <input class="form-control" name="file" type="file" id="file" value="{{ isset($leave->file) ? $leave->file : ''}}" >
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <select name="status" id="status" class="form-control">
        <option value="approve">Approve</option>
        <option value="reject">Reject</option>
    </select>
    {{-- <input class="form-control" name="status" type="text" id="status" value="{{ isset($leave->status) ? $leave->status : ''}}" > --}}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
