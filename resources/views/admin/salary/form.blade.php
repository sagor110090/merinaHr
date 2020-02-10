<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    {{-- <input class="form-control" name="employee_id" type="text" id="employee_id" value="{{ isset($salary->employee_id) ? $salary->employee_id : ''}}" required> --}}
    <select name="employee_id" id="employee_id" class="select form-control">
        @foreach (Hr::findAll('employees') as $item)
            <option value="{{$item->id}}">{{$item->fname.' '.$item->lname}}</option>
        @endforeach
    </select>
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($salary->amount) ? $salary->amount : ''}}" required>
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fine') ? 'has-error' : ''}}">
    <label for="fine" class="control-label">{{ 'Fine' }}</label>
    <input class="form-control" name="fine" type="text" id="fine" value="{{ isset($salary->fine) ? $salary->fine : ''}}" >
    {!! $errors->first('fine', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('month') ? 'has-error' : ''}}">
    <label for="month" class="control-label">{{ 'Month' }}</label>
    <input class="form-control" name="month" type="text" id="month" value="{{ isset($salary->month) ? $salary->month : ''}}" required>
    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bank_id') ? 'has-error' : ''}}">
    <label for="bank_id" class="control-label">{{ 'Bank' }}</label>
    {{-- <input class="form-control" name="bank_id" type="text" id="bank_id" value="{{ isset($salary->bank_id) ? $salary->bank_id : ''}}" required> --}}
    <select name="bank_id" id="bank_id" class="select form-control">
        @foreach (Hr::findAll('banks') as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    {!! $errors->first('bank_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('chcek_no') ? 'has-error' : ''}}">
    <label for="chcek_no" class="control-label">{{ 'Chcek No' }}</label>
    <input class="form-control" name="chcek_no" type="text" id="chcek_no" value="{{ isset($salary->chcek_no) ? $salary->chcek_no : ''}}" required>
    {!! $errors->first('chcek_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($salary->date) ? $salary->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
