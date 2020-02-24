<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($leave->date) ? $leave->date : ''}}">
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}" {{ (!Hr::isAdmin()) ? 'hidden' : ''}}>
    <label for="employee_id" class="control-label">{{ 'Employee Name' }}</label>
    <select name="employee_id" id="" class="form-control">
        <option value="{{isset($leave->employee_id) ? $leave->employee_id  : ''}}">
            {{ isset($leave->employee_id) ? $leave->employee->fname.' '.$leave->employee->lname  : ''}}</option>
    </select>
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('application') ? 'has-error' : ''}}">
    <label for="application" class="control-label">{{ 'Application' }}</label>
    <textarea name="application" id="application" cols="30" rows="10"
        class="form-control">{{ isset($leave->application) ? $leave->application : ''}}</textarea>
    {!! $errors->first('application', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <label for="file" class="control-label">{{ 'File' }}</label>
    <input class="form-control" name="file" type="file" id="file" value="{{ isset($leave->file) ? $leave->file : ''}}">
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}" {{ (!Hr::isAdmin()) ? 'hidden' : ''}}>
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <select name="status" id="status" class="form-control">
        <option value="approve">Approve</option>
        <option value="reject">Reject</option>
    </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>